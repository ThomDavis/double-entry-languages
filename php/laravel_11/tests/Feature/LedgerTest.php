<?php

namespace Tests\Feature;

use App\Models\Ledger;

it('returns the first ledger', function () {


    $response = $this->get('/ledgers/1');

    $response->assertStatus(200);
    $response->assertSee('laravel');
});

it('parses transactions', function () {
    $response = $this->get('/ledgers/1/parse');
    $response->assertStatus(200);
    $response->assertSee('Ledger parsed');

    $ledger = Ledger::find(1);
    expect($ledger->entries->count())->toEqual(10);
});
