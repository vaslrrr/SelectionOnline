<?php

require_once 'database_engine.php';
require_once 'template_engine.php';

const LOGIN = 'login';
const PASSWORD = 'pass';

DB::init();

function sendEMail($address, $text)
{
    //TODO:MakeItWork
}

function formatSNILS($num)
{
    $output = "";

    $output .= mb_substr($num, 0, 3);
    $output .= " ";

    $output .= mb_substr($num, 3, 3);
    $output .= " ";

    $output .= mb_substr($num, 6, 3);
    $output .= " ";

    $output .= mb_substr($num, 9);

    return $output;
}