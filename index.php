<?php
require_once("./vendor/autoload.php");
require_once("private/config.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container col-xxl-8 px-4 py-5 mt-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="assets/img/hero-img.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                    width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Simple PHP Login System</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ipsa, dolorum ducimus
                    accusantium iste earum non veniam nostrum molestias quam libero modi optio, ad ipsum porro excepturi
                    quasi minima veritatis.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="src/login.php" class="btn btn-primary btn-lg px-4 me-md-2">Login</a>
                    <a href="src/signup.php" class="btn btn-outline-secondary btn-lg px-4">Signup</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>