<?php

use foop\pee;

$web = new pee();

$web
    ->table()
    ->thead()
    ->tr()
    ->th("Id")
    ->th("Email")
    ->th("Username")
    ->th("password")
    ->th("action")
    ->tr("/")
    ->thead("/");

$web
    ->tbody()
    ->tr();

foreach ($data as $acc) :

    $web
        ->td($acc['ID'])
        ->td($acc['email'])
        ->td($acc['username'])
        ->td($acc['password']);

    $web
        ->td()
        ->form("-")
        ->method("get")
        ->action("/search")
        ->form(">")
        ->button("-")
        ->name("id")
        ->value($acc['ID'])
        ->button(">")
        ->content("Delete")
        ->button("/")
        ->form("/")
        ->form("/")
        ->td("/");
endforeach;
$web
    ->tr("/")
    ->tbody("/")
    ->tfoot()
    ->tr()
    ->td("Id")
    ->td("Email")
    ->td("Username")
    ->td("password")
    ->td("action")
    ->tr("/")
    ->tfoot("/")
    ->table("/");


$web->br();
function inputs($name)
{
    $web = new pee();

    $web->input("-")
        ->name($name)
        ->input(">");
}


$web
    ->form("-")
    ->form(">");
inputs("id");
inputs("name");


$web->form("/");
