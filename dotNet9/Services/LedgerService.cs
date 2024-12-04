using MvcMovie.Data;

namespace MvcMovie.Services;

public class LedgerService
{
    private readonly DataContext _context;

    public LedgerService(DataContext context)
    {
        _context = context;
    }
    
    
    public void Parse()
    {
        Console.WriteLine("hello");
        using (var db = _context)
        {
            var ledgers = db.Ledgers
                .OrderBy(b => b.Name)
                .ToList();
                
            
            foreach (var ledger in ledgers) {
                Console.WriteLine("hello");
                // Console.WriteLine(ledger.Name);
            }
        }
        // step 1 create or find a starting ledger // checkout
        
        // step 2 read json file of transactions
        // newtonsoft json
        // copilot
        
        // step create a new ledger entity
        
        // step 4  loop through transactions and store dem
        
        // step 5 confirm validate check in
        
        // echo "Hello, World!";
        
        
        
    }
    // step 1 create or find a starting ledger // checkout
    
    // step 2 read json file of transactions
    // newtonsoft json
    // copilot
    
    // step create a new ledger entity
    
    // step 4  loop through transactions and store dem
    
    // step 5 confirm validate check in
    
    
    
    
//     $transactions = json_decode(file_get_contents(base_path('../../transactions.json')), true);
//
//     $random_checkout_resource_string = rand(1, 1000);
//         $ledger = Ledger::firstOrCreate(['name' => 'laravel']);
//
//     $checked_out = $ledger->checkout($random_checkout_resource_string);
//
//     if (!$checked_out) {
//         $this->error('Ledger is already checked out');
//         return;
//     }
//
// foreach ($transactions as $transaction) {
//     $entry =  $ledger->createEntry($transaction['asset_balance'], $transaction['liability_balance'], 'transaction');
//     foreach ($transaction['records'] as $item) {
//         $entry->addItem($item['asset_amount'], $item['liability_amount'], $random_checkout_resource_string, $item['description']);
//     }
//     $entry->validateAndClose();
//         $ledger->updateBalances($entry);
// }
//
// $ledger->checkoutComplete();
    
}