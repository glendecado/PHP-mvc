<?php
define('MY_APP', true);
define("Database", 'sqlite:./Database/database.db');


require_once('./App/require.php');

use mvc\Controller;
use manage\Session;
use manage\Request;
use web\Routes;

$controller = new Controller;

Routes::add('/', [$controller, 'view']);

Routes::add('/insert', [$controller, 'insert']);

Routes::add('/d', [$controller, 'delete']);

Routes::add('/search' . Request::urlGet('id'), [$controller, 'search']);

Routes::start();
