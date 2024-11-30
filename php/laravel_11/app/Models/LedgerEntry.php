<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    protected $table = 'ledger_entries';
    protected $fillable = [
        'ledger_id',
        'assets_balance',
        'liabilities_balance',
        'created_at',
        'created_resource',
        'status',
    ];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }

    public function items()
    {
        return $this->hasMany(LedgerEntryItem::class);
    }

    public static function createEntry(int $ledger_id, $assets_balance, $liabilities_balance, $created_resource)
    {
        $entry = new LedgerEntry();
        $entry->ledger_id = $ledger_id;
        $entry->assets_balance = $assets_balance;
        $entry->liabilities_balance = $liabilities_balance;
        $entry->created_at = now();
        $entry->created_resource = $created_resource;
        $entry->status = 'started';
        $entry->save();
        return $entry;
    }

    public function addItem(int $asset_amount, int $liability_amount, $created_resource)
    {
        return $this->items()->create([
            'asset_amount' => $asset_amount,
            'liability_amount' => $liability_amount,
            'created_resource' => $created_resource,
        ]);
    }

    public function validateAndClose(): bool
    {
        // sum up assets and liabilities
        // they must balance out

        $assets = $this->items()->sum('liability_amount');
        $liabilities = $this->items()->sum('asset_amount');

        if ($assets != $liabilities) {
            $this->status = 'failed';
            $this->status_message = 'Assets and liabilities do not balance out';
            $this->save();
            return false;
        }

        if ($this->assets_balance != $assets || $this->liabilities_balance != $liabilities) {
            $this->status = 'failed';
            $this->status_message = 'Assets and liabilities do not match the ledger';
            $this->save();
            return false;
        }

        $this->status = 'closed';
        $this->save();

        return true;
    }
}
