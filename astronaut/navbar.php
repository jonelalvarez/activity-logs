<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Astronaut System</title>
    <link rel="stylesheet" href="style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- for sweetalert2 and js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--for sweetalert2-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .navbar-nav a {
                color: white;
                margin-right: 20px;
            }

            .navbar-nav a:hover {
                color: #fff;
                transform: scale(1.05);
                transition: transform 0.2s ease;
            }

            .navbar .fa-user-circle {
                margin-right: 5px;
            }

            .dropdown-menu a {
                color: #000;
            }

            .dropdown-menu a:hover {
                color: #fff;
                background-color: #0b3d91;

            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-light" style="background-color: #0b3d91;;">
                <div class="container">
                    <!-- Left Side Links -->
                    <ul class="navbar-nav mb-2">
                        <li class="nav-item mt-2">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                                <img src="images/NASA.png" alt="logo" class="card-title card-img-top"
                                    style="width: 100px; height: 30px;">
                            </a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block mt-3">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <!-- <li class="nav-item d-none d-sm-inline-block mt-3">
                            <a href="insertbranch.php" class="nav-link">Add New Branch</a>
                        </li> -->
                        <li class="nav-item d-none d-sm-inline-block mt-3">
                            <a href="allusers.php" class="nav-link">View Users</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block mt-3">
                            <a href="viewbranch.php" class="nav-link">View Branches</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block mt-3">
                            <a href="activitylogs.php" class="nav-link">Activity Logs</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fa-lg"></i>
                                <?php if (isset($_SESSION['username'])) { ?>
                                    <span><?php echo ($_SESSION['username']); ?></span>
                                <?php } ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <?php if (isset($_SESSION['username'])) { ?>
                                    <a class="dropdown-item" href="core/handleForms.php?logoutUserBtn=1">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign out
                                    </a>
                                <?php } else { ?>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;No
                                        user logged in</a>
                                <?php } ?>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </body>

    </html>


</body>

</html>