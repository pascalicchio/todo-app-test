<?php
    // capture/store the information
    // treat the information
    $submitted_task = strip_tags($_POST['task']);

    if (empty($submitted_task)) {
        die("Error: field is empty!<br><a href='index.php'>go back</a> or read <a href='about.php'>about it</a>");
    }
    
    include 'connection.php';

    // add the information on the database
    $query = "INSERT INTO tasks (task) VALUES ('$submitted_task')";
    if ($conn->query($query)) {
        header('Location: /');
    } else {
        echo 'error';
    }
    
    // redirect the user to the index page
    
?>