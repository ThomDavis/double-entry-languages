<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerEntryItem extends Model
{
    protected $table = 'ledger_entry_items';
    protected $fillable = [
        'ledger_entry_id',
        'asset_balance',
        'liability_balance',
        'created_at',
        'created_resource',
    ];

    public function ledgerEntry()
    {
        return $this->belongsTo(LedgerEntry::class);
    }

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
