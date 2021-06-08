<?php

// redirect to homepage if already loggedin
session_start();

if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true) {
    header("location: " . $_SESSION["DOCUMENT_ROOT"] . "/user-app/index.php");
    exit;
}

require_once("../vendor/autoload.php");
require_once("config.php");

date_default_timezone_set("Asia/Dhaka");


function getUsers($mysqli)
{
    $sql = "SELECT user, full_name, email, created_at FROM users;";

    $res = $mysqli->query($sql);
    $users = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($users as $user) {
        echo "<tr><td>" . $user["full_name"] . "</td><td>" . $user["email"] . "</td><td>" . date("F jS, Y g:i A", strtotime($user["created_at"])) . "</td></tr>";
    }
}