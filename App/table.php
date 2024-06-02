<?php


namespace web;

include(__DIR__ . '/../App/urlProtection.php');
use PDO;
use PDOException;
class Table
{

    private $entity;
    private $attributes;

    public function __construct($entity, $attributes)
    {

        $this->model($entity, $attributes);
        $this->controller($entity);
        $this->createDatabase($entity, $attributes);

        $this->updateRequireFile($entity);
    }
    public function model($entity, $attributes)
    {

        $directory = "./Model/";
        $myfile = fopen($directory . $entity . '.php', "w") or die("Unable to open file!");


        foreach($attributes as $key=>$value){
            $att[] = '\''.$key. '\'=>\'' . $value . '\'';
        }

        $attToText = implode(", ", $att);

        $txt = '<?php

namespace mvc;

include(__DIR__ . \'/../App/urlProtection.php\');

use mvc\Model;

class '.$entity.' extends Model
{

    protected $entity = \''.$entity.'\';
    protected $attributes = ['.$attToText.'];
}';



        fwrite($myfile, $txt);
        fclose($myfile);
    }


    public function controller($entity){
        $directory = "./Controller/";
        $myfile = fopen($directory . $entity . 'Controller.php', "w") or die("Unable to open file!");


        $txt = '<?php


namespace mvc;

include(__DIR__ . \'/../App/urlProtection.php\');



use manage\Request;
use manage\Session;
use mvc\Model;
use mvc\\'.$entity.';

class ' . $entity . 'Controller
{

    private $model;

    function __construct()
    {
        $this->model = new '.$entity.'();
    } 
        
}';



        fwrite($myfile, $txt);
        fclose($myfile);
    }


    private function createDatabase($entity, $attributes)
    {
        try {
            $db = new PDO('sqlite:./Database/database.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $table = array_map(fn ($key, $value) => "$key $value", array_keys($attributes), $attributes);
            $sql = implode(', ', $table);
            $query = "CREATE TABLE IF NOT EXISTS $entity ($sql)";
            $db->exec($query);
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }

    private function updateRequireFile($entity)
    {
        $directory = __DIR__ . '/../App/';
        $filePath = $directory . 'require.php';

        // Read the existing content of the file
        $currentContent = file_get_contents($filePath);

        // Define the require_once statements
        $modelRequire = "require_once 'Model/$entity.php';";
        $controllerRequire = "require_once 'Controller/".$entity."Controller.php';";

        // Check if the statements are already present
        if (strpos($currentContent, $modelRequire) === false) {
            $currentContent .= "\n" . $modelRequire;
        }
        if (strpos($currentContent, $controllerRequire) === false) {
            $currentContent .= "\n" . $controllerRequire;
        }

        // Write the updated content back to the file
        file_put_contents($filePath, $currentContent);
    }
}
