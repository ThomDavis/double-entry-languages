<?php

use App\Models\Ledger;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return json_encode(['message' => 'Hello, World!']);
});

Route::get('/ledgers/{ledger}', function (Ledger $id) {
    return json_encode(['id' => $id]);
});
