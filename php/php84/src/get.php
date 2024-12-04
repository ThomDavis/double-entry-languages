<?php


namespace App;

global $pdo;

use PDO;

require 'Data/db.php';

$sql = "SELECT * FROM ledgers";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);

//
//function handlePost($pdo, $input) {
//    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute(['name' => $input['name'], 'email' => $input['email']]);
//    echo json_encode(['message' => 'User created successfully']);
//}
//
//function handlePut($pdo, $input) {
//    $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute(['name' => $input['name'], 'email' => $input['email'], 'id' => $input['id']]);
//    echo json_encode(['message' => 'User updated successfully']);
//}
//
//function handleDelete($pdo, $input) {
//    $sql = "DELETE FROM users WHERE id = :id";
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute(['id' => $input['id']]);
//    echo json_encode(['message' => 'User deleted successfully']);
//}
