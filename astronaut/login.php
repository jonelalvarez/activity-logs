<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login | Astronaut Management System</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        .card {
            margin-top: 150px;
            border-radius: 36px;
            border: 5px solid #0b3d91;
            height: 450px;
            max-width: 450px;
        }

        .card-footer {
            background-color: #0b3d91;
            margin-top: 30px;
            border-bottom-left-radius: 29px !important;
            border-bottom-right-radius: 29px !important;
        }

        p {
            color: white;
            font-weight: bold;
        }

        a {
            color: #dd361c;
            font-weight: bolder;
        }

        .form-control {
            border: 2px solid #0b3d91;
        }

        .btn {
            margin-bottom: -11px;
            margin-top: 12px;
        }

        label {
            padding-right: 100%;
            font-weight: bolder;
        }

        .btn {
            background-color: #0b3d91 !important;
            color: white;
            font-weight: bold
        }

        .btn:hover {
            color: #fff;
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }

        h5 {
            font-weight: bold;
        }
    </style>
</head>

<body>
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
    <!-- <h1>Login Now!</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="username">Password</label>
            <input type="password" name="password">
            <input type="submit" name="loginUserBtn">
        </p>
    </form>
    <p>Don't have an account? You may register <a href="register.php">here</a></p>
 -->

    <!-- old -->
    <div class="login-page">
        <div class="card text-center col-md-4 mx-auto">
            <!-- <div class="card-header">
        Fill in the input fields below
        </div> -->
            <div class="card-body">

                <img src="images/NASA-logo.png" alt="Logo" class="card-title card-img-top mt-3"
                    style="width: 90px; height: 70px;">
                <h5 class="card-title" name="header">Log in your account</h5>
                <form action="core/handleForms.php" method="POST">

                    <div class="col-md-12 mx-auto mt-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>

                    <div class="col-md-12 mx-auto mt-3">
                        <label for="username">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn w-50" name="loginUserBtn" value="Login">
                    </div>


            </div>
            <div class="card-footer col-md-12 mx-auto">
                <p>Don't have an account? Register <a href="register.php">here</a></p>
            </div>
            </form>
        </div>
    </div>

</body>

</html>