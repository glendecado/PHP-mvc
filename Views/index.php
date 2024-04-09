<?php

use foop\pee;

$html = new pee;



$html
    ->form()
    ->method("get")
    ->action("/search")
    ->end()
    ->input()
    ->name("id")
    ->type("text")
    ->placeholder("enter id")
    ->end()
    ->button()
    ->type("submit")
    ->end()
    ->content("enter")
    ->button("/");
