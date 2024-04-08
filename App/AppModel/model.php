<?php

namespace mvc;

use PDO;
use PDOException;


class Model
{
    //we will put our pdo here
    private $db;
    //to config in child, a tables name
    protected $entity;
    //to config in child, a tables name row name
    protected $attributes;


    function __construct()
    {
        //connecting to pdo we define database in index.php
        $this->db = new PDO(Database);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //checking if the table exist or not
        $sql = '';
        foreach ($this->attributes as $key => $value) {
            $sql .= "$key $value, ";
        }
        $sql = rtrim($sql, ', ');
        $query = "CREATE TABLE IF NOT EXISTS $this->entity ($sql)";
        $this->db->exec($query);
    }

    function create($data)
    {
        $values = array_map(function ($col) {
            return ":$col ";
        }, array_keys($this->attributes));
        $val = implode(", ", $values);

        $atributesStr = implode(', ', array_keys($this->attributes));

        $sql = "INSERT INTO $this->entity ($atributesStr) VALUES ($val)";

        $stmt = $this->db->prepare($sql);

        $i = 0;
        foreach ($this->attributes as $key => $value) {
            if (strpos($value, 'PRIMARY KEY')) {
                continue;
            } else {
                $stmt->bindValue(":$key", $data[$i]);
                $i++;
            }
        }
        $stmt->execute();
    }

    function delete($deleteBy, $todelete)
    {
        $sql = "DELETE FROM $this->entity WHERE $deleteBy = $todelete";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}




///////////////////////////////////////////////////
/* !defined('MY_APP') ? header('location: ../') : ''; */
