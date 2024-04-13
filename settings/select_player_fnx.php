<?php

include '../settings/connection.php';

$playerNames = array();

$sql = "SELECT * FROM Players";

$result = mysqli_query($connection,$sql);

if($result){
    while ($row = mysqli_fetch_assoc($result)){
        $playerNames[] = $row;
    }
}





























?>