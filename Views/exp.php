<?php

use foop\pee;



$web = new pee();

$web->table("class:userTable")->thead()->tr();

$web->th("ID");
$web->th("email");
$web->th("Username");
$web->th("password");

$web->tr("/")->thead("/");

$web->tbody()->tr();

foreach ($data as $acc) :
    $web
        ->td($acc['ID'])
        ->td($acc['email'])
        ->td($acc['username'])
        ->td($acc['password']);
endforeach;

$web->tr("/")->tbody("/");
$web->table("/");
?>

<style>
    /* CSS for the userTable */
    .userTable {
        width: 100%;
        /* Set the width of the table */
        border-collapse: collapse;
        /* Collapse table borders */
        border: 1px solid #ccc;
        /* Add border to the table */
    }

    /* CSS for table headings */
    .userTable th {
        background-color: #f2f2f2;
        /* Background color for table headers */
        color: #333;
        /* Text color for table headers */
        padding: 8px;
        /* Padding for table headers */
        border: 1px solid #ccc;
        /* Add border to table headers */
    }

    /* CSS for table cells */
    .userTable td {
        padding: 8px;
        /* Padding for table cells */
        border: 1px solid #ccc;
        /* Add border to table cells */
    }

    /* CSS for alternating row colors */
    .userTable tr:nth-child(even) {
        background-color: #f9f9f9;
        /* Background color for even rows */
    }

    /* CSS for hover effect on rows */
    .userTable tr:hover {
        background-color: #f2f2f2;
        /* Background color on hover */
    }
</style>