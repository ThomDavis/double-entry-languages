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

    public function checkout($resource): bool
    {
        $this->fresh();

        if ($this->checkout_resource) {
            return false;
        }

        $this->checkout_resource = $resource;
        $this->checkout_at = now();
        $this->save();

        return true;
    }

    public function checkoutComplete()
    {
        $this->checkout_resource = null;
        $this->checkout_at = null;
        $this->save();
    }

    public function createEntry($assets_balance, $liabilities_balance, $created_resource): LedgerEntry
    {
        return $this->entries()->create([
            'assets_balance' => $assets_balance,
            'liabilities_balance' => $liabilities_balance,
            'created_resource' => $created_resource,
            'status' => 'started',
        ]);
    }

    public function updateBalances(LedgerEntry $entry)
    {
        $this->assets_balance += $entry->assets_balance;
        $this->liabilities_balance += $entry->liabilities_balance;
        $this->save();
    }
}
