<?php
define('MY_APP', true);
define("Database", 'sqlite:./Database/database.db');

require_once('./App/require.php');

use mvc\Controller;
use manage\Session;
use manage\Request;
use web\Routes;



Routes::add('/', [Controller::class, 'view']);

Routes::add('/m', [Controller::class, 'insert']);

Routes::start();
