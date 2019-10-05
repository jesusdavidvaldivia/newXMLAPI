<?php
define('DEBUG', true);

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

include 'newXMLAPI/newXMLAPI.php';

use newXMLAPI\newXMLAPI as api;

$api = new api();
$api->createEmailAccount("gruposhirushi.com","text11311w23","jesusd");

if($api->errors()){
    echo $api->errors();
} else {
    echo "Crear Success";
}

$api->setEmailAccount("gruposhirushi.com","text11311w23","jesusd");
$api->changePassword("jesus1");

if($api->errors()){
    echo $api->errors();
} else {
    echo "Password Success";
}

$api->delAccount();

if($api->errors()){
    echo $api->errors();
} else {
    echo "Delete Success";
}
?>