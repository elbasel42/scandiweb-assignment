<?php

require_once('../Models/Database.php');

use Models\Database;

//* Test Insert
$db = new Database;
$db->insert('Books', [
    'sku' => uniqid(),
    'name' => "book",
    'price' => 2,
    'weight' => 5,
]);

//* Test Delete
// $db->delete('Books', 12);

//* Test Select
// $result = $db->select('Books', 17);
// var_dump($result);

//* Test Select all
// $all_rows = $db->select_all('Books');
// print_r($all_rows);

//* Test Update
// $db->update('Books', '33', ['name' => 'book12asdf3', 'sku' => '123234']);