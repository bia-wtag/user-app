<?php
require_once("../private/signupController.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/signup.css">
</head>

<body>
    <div class="container px-4 py-5 mt-5">
        <div class="row py-4">
            <h1>Sign Up Form</h1>
            <p>Please fill this form to create an account.</p>
        </div>
        <div class="form-row row">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label class="mb-1">Full Name</label>
                    <input type="text" name="full_name"
                        class="form-control mb-2 <?php echo (!empty($full_name_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $full_name; ?>">
                    <span
                        class="invalid-feedback <?php echo (!empty($confirm_password_err)) ? 'mb-2' : ''; ?>"><?php echo $full_name_err; ?></span>
                </div>
                <div class="form-group">
                    <label class="mb-1">Email</label>
                    <input type="email" name="email"
                        class="form-control mb-2 <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $email; ?>">
                    <span
                        class="invalid-feedback <?php echo (!empty($confirm_password_err)) ? 'mb-2' : ''; ?>"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group">
                    <label class="mb-1">Password (atleast 8 characters)</label>
                    <input type="password" name="password"
                        class="form-control mb-2 <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $password; ?>">
                    <span
                        class="invalid-feedback <?php echo (!empty($confirm_password_err)) ? 'mb-2' : ''; ?>"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <label class="mb-1">Confirm Password</label>
                    <input type="password" name="confirm_password"
                        class="form-control mb-2 <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $confirm_password; ?>">
                    <span
                        class="invalid-feedback <?php echo (!empty($confirm_password_err)) ? 'mb-2' : ''; ?>"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group my-4">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input id="resetBtn" type="reset" class="btn btn-secondary ml-3" value="Reset">
                </div>
                <p>Already have an account? <a class="text-decoration-none" href="login.php">Login here</a>.</p>
            </form>
        </div>
    </div>
    <script>
    document.getElementById("resetBtn").addEventListener("click", () => {
        document.querySelectorAll(".invalid-feedback").forEach(elem => {
            elem.innerHTML = "";
        });

        document.querySelectorAll(".form-control").forEach(elem => {
            elem.classList.remove("is-invalid");
        })
    })
    </script>
</body>

</html>