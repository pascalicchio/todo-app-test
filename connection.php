<?php

require 'vendor/autoload.php'; // Load Composer autoloader
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Connect to PlanetScale using credentials stored in environment variables
$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, "/etc/ssl/cert.pem", NULL, NULL);
$conn->real_connect('us-east.connect.psdb.cloud', '5xxc7i38svk7qo601u7a', 'pscale_pw_bdSJVAUqS7dJOmf6WHb7ktAfaaXhNkwDA43Kn3oM0Vx', 'test');

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}