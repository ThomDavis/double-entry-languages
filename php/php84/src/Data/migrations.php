<?php

namespace App\Data;


include 'db.php';

// create ledgers table // create ledgers table
$sql = "CREATE TABLE IF NOT EXISTS ledgers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    checkout_at TIMESTAMP DEFAULT NULL,
    assets_balance INTEGER DEFAULT 0,
    liabilities_balance INTEGER DEFAULT 0,
    checkout_resource VARCHAR NULL                    
)";
$pdo->exec($sql);

// create ledger_entities table
$sql = "CREATE TABLE IF NOT EXISTS ledger_entities (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ledger_id INTEGER NOT NULL,
    name TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    assets_balance INTEGER DEFAULT 0,
    liabilities_balance INTEGER DEFAULT 0,
    created_resource VARCHAR NULL,
    status VARCHAR NULL,
    status_message VARCHAR NULL,
    FOREIGN KEY (ledger_id) REFERENCES ledgers(id)
)";
$pdo->exec($sql);

// create ledger_entity_items table
$sql = "CREATE TABLE IF NOT EXISTS ledger_entity_items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ledger_entity_id INTEGER NOT NULL,
    ledger_id INTEGER NOT NULL,
    description TEXT NOT NULL,
    asset_amount INTEGER NOT NULL,
    liability_amount INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    created_resource VARCHAR NULL,
    
    FOREIGN KEY (ledger_id) REFERENCES ledgers(id),
    FOREIGN KEY (ledger_entity_id) REFERENCES ledger_entities(id)
)";
$pdo->exec($sql);


// insert the starter ledger record

$sql = "INSERT INTO ledgers (name) VALUES ('Starter Ledger')";
$pdo->exec($sql);