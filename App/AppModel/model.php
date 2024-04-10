<?php

namespace mvc;

include(__DIR__ . '/../urlProtection.php');


use PDO;
use PDOException;
use Exception;


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
        try {
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
        } catch (Exception $e) {

            return 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    function delete($deleteBy, $todelete)
    {
        try {

            $sql = "DELETE FROM $this->entity WHERE $deleteBy = $todelete";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    function viewBy($searchBy, $toSearch)
    {
        $sql = "SELECT * FROM $this->entity WHERE $searchBy = $toSearch";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function viewAll()
    {
        $sql = "SELECT * FROM $this->entity";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function update($data, $id)
    {
        $values = array_map(function ($col) {
            return ":$col ";
        }, array_keys($this->attributes));
        $val = implode(", ", $values);

        $atributesStr = implode(', ', array_keys($this->attributes));

        $sql = $this->db->prepare("UPDATE  $this->entity SET $atributesStr WHERE :ID");
        $stmt = $this->db->prepare($sql);
        $i = 0;
        foreach ($this->attributes as $key => $value) {

            $stmt->bindValue(":$key", $data[$i]);
            $i++;
        }
        $stmt->execute();
    }
}




///////////////////////////////////////////////////
/* !defined('MY_APP') ? header('location: ../') : ''; */
