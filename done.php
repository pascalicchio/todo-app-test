<?php
// capture/store the information
// treat the information
$id = $_GET['id'];

include 'connection.php';

// Mark as read the information on the database
$query = "UPDATE tasks SET status = 1 WHERE id = $id";

if ($conn->query($query)) {
    // redirect the user to the index page
    header('Location: /');
} else {
    echo 'error';
}
