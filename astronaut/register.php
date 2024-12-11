<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Astronaut Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .reg-page .card {
            margin-top: 150px;
            border-radius: 36px;
            border: 5px solid #0b3d91;
            height: 700px;
            max-width: 600px;
        }

        .reg-page .card-footer {
            background-color: #0b3d91;
            margin-top: 28px;
            border-bottom-left-radius: 29px !important;
            border-bottom-right-radius: 29px !important;
        }

        .reg-page p {
            color: white;
            font-weight: bold;
        }

        .reg-page a {
            color: #dd361c;
            font-weight: bolder;
        }

        .reg-page .form-control {
            border: 2px solid #0b3d91;
        }

        .reg-page .btn {
            background-color: #0b3d91 !important;
            color: white;
            font-weight: bold
        }

        .reg-page label {
            padding-right: 100%;
            font-weight: bolder;
        }



        .reg-page .btn:hover {
            color: #fff;
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }
    </style>
</head>

<body>
    <div class="reg-page">

        <?php
        if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

            if ($_SESSION['status'] == "200") {
                echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
            } else {
                echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>";
            }

        }
        unset($_SESSION['message']);
        unset($_SESSION['status']);
        ?>
        <div class="card text-center col-md-4 mx-auto">
            <div class="card-body">


                <img src="images/NASA-logo.png" alt="user" class="card-title card-img-top mt-3"
                    style="width: 90px; height: 70px;">
                <h5 class="card-title" name="header" style="font-weight: bold">Register first</h5>
                <form action="core/handleForms.php" method="POST">

                    <div class="col-md-12 mx-auto mt-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>
                    <div class="col-md-12 mx-auto mt-3">
                        <label for="first_name">Firstname</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
                    </div>
                    <div class="col-md-12 mx-auto mt-3">
                        <label for="last_name">Lastname</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter lastname">
                    </div>

                    <div class="col-md-12 mx-auto mt-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                    <div class="col-md-12 mx-auto mt-3">
                        <label for="confirm_password">Confirm</label>
                        <input type="password" class="form-control" name="confirm_password"
                            placeholder="Confirm password">
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn w-50" name="insertNewUserBtn" value="Create Account">
                    </div>


            </div>
            <div class="card-footer col-md-12 mx-auto">
                <p>Already have an account? <a href="login.php">Back to login</a></p>
                <p><?php if (isset($_SESSION['message'])) { ?>
                    <p class="mt-0" style="color: red; "><?php echo $_SESSION['message']; ?></p>
                <?php }
                unset($_SESSION['message']); ?></p>
            </div>
        </div>
    </div>



    </form>
</body>





</html>