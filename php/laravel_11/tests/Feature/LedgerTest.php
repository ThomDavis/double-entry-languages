<?php

it('returns the first ledger', function () {
    $response = $this->get('/ledger/1');

    $response->assertStatus(200);
    $response->assertSee('Ledger 1');
});
