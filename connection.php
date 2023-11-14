<?php
// connecting to the database
$localserver = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'todo';

$conn = new mysqli($localserver, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
