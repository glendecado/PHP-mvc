<?php

use foop\pee;



$web = new pee();




$web->table("class:userTable bg fgh gfhfgh dd : id : dsf dsfgfd fgfdg")->thead()->tr();

$web->th("ID");
$web->th("email");
$web->th("Username");
$web->th("password");
$web->th("action");

$web->tr("/")->thead("/");

$web->tbody();

foreach ($data as $acc) :
    $web
        ->tr()
        ->td($acc['ID'])
        ->td($acc['email'])
        ->td($acc['username'])
        ->td($acc['password'])
        ->td()
        ->form("method:post:action:/d")
        ->button("name:id : value:" . $acc['ID'] . "")->cont("delete")->button("/")
        ->form("/")
        ->td("/")
        ->tr();
endforeach;

$web->tbody("/");
$web->table("/")->br();

$web
    ->form("method:post : action:/insert : type: text")
    ->input("name:email : placeholder: email : type: text")
    ->input("name:username : placeholder: username : type: text")
    ->input("name:password : placeholder: password : type: text")
    ->input("type: submit")
    ->form("/");









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