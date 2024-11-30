<?php

$pdo = new \PDO('sqlite:php83.db');

// let's create the ledger table
// - Ledger
//  - id (int)
//  - name (name_of_language)
//  - assets_balance (0 int)
//  - liabilities_balance (0 int)
//  - last_updated (datetime)
//  - created_at (datetime)
//  - checkout_resource (str)
//  - checkout_at (datetime)
//$pdo->exec('CREATE TABLE IF NOT EXISTS ledger
//(id INTEGER PRIMARY KEY,
//name varchar(255),
//assets_balance INTEGER,
//liabilities_balance INTEGER,
//last_updated DateTime,
//created_at DateTime,
//checkout_resource varchar(255),
//checkout_at DateTime
//
//)');



//- Ledger Entry
//- id
//- ledger_id
//- asset_balance
//- liability_balance
//- created_at
//- created_resource

$pdo->exec('CREATE TABLE IF NOT EXISTS ledger_entry
(id INTEGER PRIMARY KEY,
ledger_id INTEGER,
assets_balance INTEGER,
liabilities_balance INTEGER,
created_at DateTime,
created_resource varchar(255),
)');

