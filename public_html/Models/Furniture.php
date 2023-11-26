<?php

namespace Models;

require_once('Database.php');

use Models\Database;

class Furniture 
{
    private Database $_db;

    public function __construct()
    {
        $this->_db = new Database();
    }
    
    public function get_all_Furniture()
    {
        return $this->_db->select_all('Furniture');
    }
}
