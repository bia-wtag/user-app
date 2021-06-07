<?php

// redirect to homepage if already loggedin
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../src/homepage.php");
    exit;
}


use Ramsey\Uuid\Uuid;

require_once("../vendor/autoload.php");
require_once("config.php");

function doesExist($email, $mysqli)
{
    // check database to see if email already exists
    $query = "SELECT * FROM users WHERE email = ?";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1)
                return "This username is already taken.";
            else return "";
        } else return "Something went wrong. Please try again later.";

        $stmt->close();
    }
}

function validateFullName($full_name)
{
    $full_name = trim($full_name);
    if (empty($full_name))
        return "Name can't be empty.";
    else if (!preg_match('/^[a-zA-Z_ ]+$/', $full_name))
        return "Name can only contain letters, whitespaces or underscores.";
    else return "";
}

function validateEmail($email, $mysqli)
{
    $email = trim($email);
    if (empty($email))
        return "Email can't be empty";

    return doesExist($email, $mysqli);
}

function validatePassword($pass)
{
    $pass = trim($pass);
    if (empty($pass))
        return "Please enter a password.";
    else if (strlen($pass) < 8)
        return "Password must have atleast 8 characters.";
    else return "";
}

function validateConfirmedPassword($pass, $password_err, $confirm_pass)
{
    $confirm_pass = trim($confirm_pass);
    $pass = trim($pass);

    if (empty($confirm_pass))
        return "Please confirm password.";
    else if (empty($password_err) && ($pass != $confirm_pass))
        return  "Password did not match.";
    else return "";
}

function createUser($full_name, $email, $pass, $mysqli)
{
    // create user in database
    $sql = "INSERT INTO users (user, full_name, email, password) VALUES (?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        // generate uuid
        $uuid = Uuid::uuid4();
        $uuid = $uuid->toString();
        // hash password
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $uuid, $full_name, $email, $pass);

        if ($stmt->execute())
            header("location: ../src/login.php");
        else return "Something went wrong. Please try again later.";

        $stmt->close();
    }
}


// init values
$full_name_err = $email_err = $password_err = $confirm_password_err = "";
$full_name = $email = $password = $confirm_password = "";

// process data at form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    $full_name_err = validateFullName($full_name);
    $email_err = validateEmail($email, $mysqli);
    $password_err = validatePassword($password);
    $confirm_password_err = validateConfirmedPassword($password, $password_err, $confirm_password);

    if (empty($full_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        createUser(
            $full_name,
            $email,
            $password,
            $mysqli
        );
    }

    $mysqli->close();
} else {
    $full_name_err = $email_err = $password_err = $confirm_password_err = "";
    $full_name = $email = $password = $confirm_password = "";
}