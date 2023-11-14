<?php
    // capture/store the information
    // treat the information
    $id = $_GET['id'];

    include 'connection.php';

    // DELETE the information on the database
    $query = "DELETE FROM tasks WHERE id = $id";
    if ($conn->query($query)) {
        header('Location: /');
    } else {
        echo 'error';
    }
    
    // redirect the user to the index page
