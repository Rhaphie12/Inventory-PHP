<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "inventory";

$connection = new mysqli($serverName, $userName, $passWord, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
