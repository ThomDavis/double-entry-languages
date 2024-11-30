<?php

namespace App\Console\Commands;

use App\Models\Ledger;
use Illuminate\Console\Command;

class ParseTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // first we grab the transactions json file from root

        // create a ledger if one doesn't exist

        // checkout the ledger

        // create a ledger entries

        // validate the ledger

        // save the ledger

        $transactions = json_decode(file_get_contents(base_path('../../transactions.json')), true);

        $random_checkout_resource_string = rand(1, 1000);
        $ledger = Ledger::firstOrCreate(['name' => 'laravel']);

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

    }
}
