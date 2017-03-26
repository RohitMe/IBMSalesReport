<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dbsaledatatracker';

//Create connection and select DB
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
