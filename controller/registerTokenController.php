<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*-----------------------------*/

require 'Climatempo.php';

/*-----------------------------*/

$token      = $_POST['token'];
$climatempo = new Climatempo($token);

$locales    = array($_POST['cidadeId']);


try {
    $cities = $climatempo->addLocalesToToken($locales);
} catch (Exception $e) {
    echo '<b>Error: </b>'.$e->getMessage();
    die();
}

/*-----------------------------*/



echo 
"<h2>Token associado aos seguintes IDs</h2>", 
implode(', ', $cities);
