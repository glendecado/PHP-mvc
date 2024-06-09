<?php

include(__DIR__ . '/app/table.php');

// Use the web namespace
use web\Table;

$product = new Table(
    'product',
    [
        'item' => 'text',
        'description' => 'text'
    ]
);

$user = new Table(
    'user',
    [
        'ID' => 'INTEGER PRIMARY KEY AUTO_INCREMENT',
        'email' => 'text',
        'Username' => 'text',
        'password' => 'text',
    ]
);


