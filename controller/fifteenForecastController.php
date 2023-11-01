<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'Climatempo.php';

$token      = 'd023a862b23655b9979d7385d889fbd8'; // Seu token
$climatempo = new Climatempo($token);
$id         = 3777; // Pinda

try {
    $forecast = $climatempo->fifteenDays($id);
} catch (Exception $e) {
    echo '<b>Error: </b>'.$e->getMessage();
    die();
}