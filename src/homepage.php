<?php
require_once("../private/homepageController.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <?php require_once("partials/navbar.php")
    ?>

    <div class="container d-flex flex-column justify-content-center align-items-start" style="min-height: 100vh;">
        <div class="table-container w-100">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col" style="width: 40%;">Email</th>
                        <th scope="col" style="width: 35%;">Full Name</th>
                        <th scope="col" style="width: 25%;">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php getUsers($mysqli); ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>