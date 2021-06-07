<?php

use Dotenv\Dotenv;

// load .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// db credentials
define('DB_SERVER', $_ENV["DB_SERVER"]);
define('DB_USERNAME', $_ENV["DB_USERNAME"]);
define('DB_PASSWORD', $_ENV["DB_PASSWORD"]);
define('DB_NAME', $_ENV["DB_NAME"]);

// connect to mysql db
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// check connection
if ($mysqli === false) {
    die("ERROR: Could not connect!\n" . $mysqli->connect_error);
}