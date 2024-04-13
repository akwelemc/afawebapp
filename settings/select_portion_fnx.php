<?php
include '../settings/connection.php';

$portionNames = array();

$sql = "SELECT * FROM FootballField";

$result = mysqli_query($connection, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $portionNames[] = $row;
    }
}
?>
