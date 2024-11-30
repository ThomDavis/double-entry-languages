<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table = 'ledgers';
    protected $fillable = [
        'name',
        'assets_balance',
        'liabilities_balance',
        'last_updated',
        'created_at',
        'checkout_resource',
        'checkout_at',
    ];

    public function entries()
    {
        return $this->hasMany(LedgerEntry::class);
    }
}
