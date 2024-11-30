<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function addItem(int $asset_amount, int $liability_amount, $created_resource, string $description)
    {
        return $this->items()->create([
            'ledger_id' => $this->ledger_id,
            'asset_amount' => $asset_amount,
            'liability_amount' => $liability_amount,
            'created_resource' => $created_resource,
            'description' => $description,
        ]);
    }

    public function validateAndClose(): bool
    {
        // sum up assets and liabilities
        // they must balance out

        $assets = $this->items()->sum('asset_amount');
        $liabilities = $this->items()->sum('liability_amount');

//        if ($assets != $liabilities) {
//            $this->status = 'failed';
//            $this->status_message = 'Assets and liabilities do not balance out';
//            $this->save();
//            return false;
//        }

        if ($this->liabilities_balance != $liabilities) {
            $this->status = 'failed';
            $this->status_message = 'liabilities do not match the ledger';
            $this->save();
            return false;
        }
        if ($this->assets_balance != $assets ) {
            $this->status = 'failed';
            $this->status_message = 'Assets do not match the ledger';
            $this->save();
            return false;
        }

        $this->status = 'closed';
        $this->save();

        return true;
    }
}
