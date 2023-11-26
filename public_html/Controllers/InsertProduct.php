<?php

require_once('../Models/Database.php');

use Models\Database;

$encoded = file_get_contents('php://input');
$decoded = json_decode($encoded, true);

$db = new Database();
$table = $decoded['table'];
unset($decoded['table']);

try {
    $db->insert($table, $decoded);
    echo "1";
} catch (\Throwable $th) {
    $error_code = $th->getCode();
    $error_msg = $th->getMessage();
    echo $error_code;
}
