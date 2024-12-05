<?php

namespace Php84;

use PDO;
use Php84\Data\DB;

$pdo = DB::pdo();

function isRoute(string $method, string $route, array ...$handlers): int
{
    global $params;
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $route_rgx = preg_replace('#:(\w+)#','(?<$1>(\S+))', $route);
    return preg_match("#^$route_rgx$#", $uri, $params);
}

function json(mixed $data): void
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

(match(1) {
    isRoute('GET', '/') => function () use ($pdo) {
        $sql = "SELECT * FROM ledgers";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        json($result);
    },
    isRoute('POST', '/ledgers/parse') => function () {
        json(['msg' => 'Created post']);
    },
    default => fn() => json(['err' => 'Route not found!'])
})();