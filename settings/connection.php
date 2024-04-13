<?php
$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_USERPASSWORD = '';
$DB_NAME = 'afa';

$connection = new mysqli($DB_HOST, $DB_USERNAME, $DB_USERPASSWORD, $DB_NAME);

if($connection -> connect_error){

    throw new Exception("Sorry! Connection failed." . $connection -> connect_error);
    die("Connection failed" . $e->getMessage());
}

else{
    echo " ";
}









?>
