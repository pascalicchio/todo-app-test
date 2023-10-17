<?php
    // capture/store the information
    // treat the information
    $id = $_GET['id'];

    // connecting to the database
    $localserver = 'localhost';
    $username = 'root';
    $password = 'every1000';
    $database = 'todo';

    $conn = new mysqli($localserver, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // DELETE the information on the database
    $query = "DELETE FROM tasks WHERE id = $id";
    if ($conn->query($query)) {
        header('Location: /');
    } else {
        echo 'error';
    }
    
    // redirect the user to the index page
