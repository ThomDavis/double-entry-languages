<?php

use App\Models\Ledger;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return json_encode(['message' => 'Hello, World!']);
});

Route::get('ledgers/', function () {
    return json_encode(['ledgers' => Ledger::all()]);
});

Route::get('/ledgers/{ledger}', function (Ledger $ledger) {
    return json_encode(['id' => $ledger->id, 'name' => $ledger->name]);
});

Route::get('/ledgers/{ledger}/parse', function (Ledger $ledger) {

    $transactions = json_decode(file_get_contents(base_path('../../transactions.json')), true);

    $random_checkout_resource_string = rand(1, 1000);

    $checked_out = $ledger->checkout($random_checkout_resource_string);

    if (!$checked_out) {
        $this->error('Ledger is already checked out');
        return;
    }

    foreach ($transactions as $transaction) {
        $entry =  $ledger->createEntry($transaction['asset_balance'], $transaction['liability_balance'], 'transaction');
        foreach ($transaction['records'] as $item) {
            $entry->addItem($item['asset_amount'], $item['liability_amount'], $random_checkout_resource_string, $item['description']);
        }
        $entry->validateAndClose();
        $ledger->updateBalances($entry);
    }

    $ledger->checkoutComplete();

    return json_encode(['message' => 'Ledger parsed']);
});
