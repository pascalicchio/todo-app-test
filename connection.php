<?php

/**
 * main-2023-11-21-9oh5k9
 * DB_HOST=aws.connect.psdb.cloud
 * DB_USERNAME=f0nk9o1ntknjnou4yy0s
 * DB_PASSWORD=pscale_pw_gnHjN5PPW82PTACMePVmhCSBpsQ6nZ16V3dNtkYOlF1
 * DB_NAME=test
 */
require 'vendor/autoload.php'; // Load Composer autoloader
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Connect to PlanetScale using credentials stored in environment variables
$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, "/etc/ssl/cert.pem", NULL, NULL);
$conn->real_connect('aws.connect.psdb.cloud', 'f0nk9o1ntknjnou4yy0s', 'pscale_pw_gnHjN5PPW82PTACMePVmhCSBpsQ6nZ16V3dNtkYOlF1', 'test');

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}
