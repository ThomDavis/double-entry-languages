<?php

namespace Php84\Data;

// drop tables and rerun migrations file
$pdo = DB::pdo();

// drop tables
$sql = "DROP TABLE IF EXISTS ledgers";
$pdo->exec($sql);

$sql = "DROP TABLE IF EXISTS ledger_entities";
$pdo->exec($sql);


$sql = "DROP TABLE IF EXISTS ledger_entity_items";
$pdo->exec($sql);

include 'migrations.php';


