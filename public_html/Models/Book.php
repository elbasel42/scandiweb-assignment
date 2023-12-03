<?php

namespace Models;

require_once('Database.php');

use Models\Database;

class Book
{
    private Database $_db;

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function get_all_books()
    {
        return $this->_db->select_all('Books');
    }
}
