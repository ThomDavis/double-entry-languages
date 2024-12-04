<?php

namespace App\Data;

// drop tables and rerun migrations file

require 'db.php';

// drop tables
$sql = "DROP TABLE IF EXISTS ledgers";
$pdo->exec($sql);

$sql = "DROP TABLE IF EXISTS ledger_entities";
$pdo->exec($sql);


$sql = "DROP TABLE IF EXISTS ledger_entity_items";
$pdo->exec($sql);

include 'migrations.php';


