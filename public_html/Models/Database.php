<?php

namespace Models;

use mysqli;

class Database
{
    private mysqli $_connection;

    public function __construct()
    {
        $this->_connection = new mysqli('localhost', 'id21517975_elbasel', 'HelloThere@123', 'id21517975_crud');
    }

    // public function __destruct()
    // {
    // $this->_connection->close();
    // }

    public function insert(string $table_name, array $data)
    {
        $keys = [];
        $values = [];
        $question_marks_string = implode(', ', array_fill(0, count($data), '?'));

        foreach ($data as $k => $v) {
            array_push($keys, $k);
            array_push($values, $v);
        }
        $keys_string = implode(', ', $keys);
        $sql = "INSERT INTO $table_name ($keys_string) VALUES ($question_marks_string)";
        $this->_connection->execute_query($sql, [...$values]);
    }

    public function delete(string $table_name, int $id)
    {
        $sql = "DELETE FROM $table_name WHERE id = ?";
        $this->_connection->execute_query($sql, [$id]);
    }

    public function select(string $table_name, int $id)
    {
        $sql = "SELECT * from $table_name WHERE id = ?";
        $row = $this->_connection->execute_query($sql, [$id])->fetch_assoc();
        return $row;
    }

    public function select_all(string $table_name)
    {
        $sql = "SELECT * from $table_name";
        $rows = $this->_connection->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    public function update($table_name, int $id, array $data)
    {
        $query_string = "";
        $keys = array_keys($data);
        $values = array_values($data);
        foreach ($keys as $index => $k) {
            if ($index === (count($keys) - 1)) {
                $query_string .= $k . " = ?";
                break;
            }
            $query_string .= $k . " = ?, ";
        }
        $sql = "UPDATE $table_name SET $query_string WHERE id = $id";
        $this->_connection->execute_query($sql, [...$values]);
    }
}
