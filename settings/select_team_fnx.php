<?php

include '../settings/connection.php';

$teamNames = array();

$sql = "SELECT * FROM Teams";

$result = mysqli_query($connection,$sql);

if($result){
    while ($row = mysqli_fetch_assoc($result)){
        $teamNames[] = $row;
    }
}





























?>