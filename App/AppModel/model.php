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
      
        //creating table if not exist
        foreach ($this->attributes as $key => $value) {
            //put the key and the value of the attributes
            $table[] = "$key $value";
        }
        $sql = implode(', ', $table);
        $query = "CREATE TABLE IF NOT EXISTS $this->entity ($sql)";
        $this->db->exec($query);
    }

    function create($data)
    {
        try {
            foreach($this->attributes as $key=>$value){
                //checking if the value of attributes is primary key
                if (strpos($value, 'PRIMARY KEY')) {
                //if true continue
                   continue;
                } else {
                //put all of the key ex.name in array
                    $keys[] = $key;
                    $val[] = ':' . $key; //for bindvalue in pdo
                }        
            }
            $vals = implode(', ', $val); //convert to string

            $atributesStr = implode(', ', $keys); //convert to string

            $sql = "INSERT INTO $this->entity ($atributesStr) VALUES ($vals)";//query

            $stmt = $this->db->prepare($sql);//prepare

           

            $count = count($keys);

            for($i= 0; $i < $count; $i++){
                $stmt->bindValue($val[$i], $data[$i]);//bind all values
                //$val ex. :name  //$data ex. glen
            }

            $stmt->execute();//excute it    
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



