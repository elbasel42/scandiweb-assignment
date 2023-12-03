<?php

require_once('../Models/Database.php');

use Models\Database;

$encoded = file_get_contents('php://input');
$decoded = json_decode($encoded, true);

$db = new Database();

foreach ($decoded as $value) {
    $table = $value[0];
    $id = $value[1];
    $db->delete($table, $id);
}
