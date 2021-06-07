<?php

// redirect to homepage if already loggedin
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../src/homepage.php");
    exit;
}

require_once("../vendor/autoload.php");
require_once("config.php");

function validateEmail($email)
{
    $email = trim($email);
    if (empty($email))
        return "Email can't be empty.";
    else
        return "";
}

function validateUser($email, $password, $mysqli)
{
    // validate user with credentials
    $sql = "SELECT full_name, email, password FROM users WHERE email = ?;";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {

                $stmt->bind_result($full_name, $email, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {

                        $_SESSION["loggedin"] = true;
                        $_SESSION["full_name"] = $full_name;
                        $_SESSION["email"] = $email;

                        header("location: ../src/homepage.php");
                    } else {
                        return "Invalid password.";
                    }
                }
            } else {
                return "User with given email doesn't exist.";
            }
        } else {
            return "Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
}

// init values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// process data at form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $email_err = validateEmail($email);

    if (empty($email_err) && empty($password_err)) {
        $login_err = validateUser($email, $password, $mysqli);
    }

    $mysqli->close();
}