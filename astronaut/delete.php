<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="card col-5 mx-auto mt-5">
        <div class="card-header" style="background-color: #dd361c; color:white">
            <?php $getUserByID = getUserByID($pdo, $_GET['astronaut_id']); ?>
            <h3><i class="fas fa-user-astronaut fa-lg"></i>&nbsp;&nbsp;Delete?</h3>

        </div>
        <div class="card-body col-12 mx-auto">
            <h5>Are you sure you want to delete this user?</h5>
            <?php $getUserByID = getUserByID($pdo, $_GET['astronaut_id']); ?>
            <h5>Astronaut ID: <?php echo $getUserByID['astronaut_id']; ?></h5>
            <h5>First Name: <?php echo $getUserByID['first_name']; ?></h5>
            <h5>Last Name: <?php echo $getUserByID['last_name']; ?></h5>
            <h5>Suffix: <?php echo $getUserByID['suffix']; ?></h5>
            <h5>Birthdate: <?php echo $getUserByID['bdate']; ?></h5>
            <h5>Gender: <?php echo $getUserByID['gender']; ?></h5>
            <h5>Country: <?php echo $getUserByID['nationality']; ?></h5>
            <h5>Email: <?php echo $getUserByID['email']; ?></h5>
            <h5>Status: <?php echo $getUserByID['status']; ?></h5>

            <div class="mb-3 d-flex justify-content-between">
                <div class="deleteBtn">
                    <form action="core/handleForms.php?astronaut_id=<?php echo $_GET['astronaut_id']; ?>" method="POST">
                        <button class="btn" style="background-color: #dd361c; color: white" name="deleteUserBtn">
                            <i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;Delete
                        </button>
                    </form>
                </div>
                <div>
                    <a href="index.php" class="btn"
                        style="background-color: #5bc0de; color: white; text-decoration: none;">
                        <i class="fas fa-sign-out-alt fa-lg"></i>&nbsp;&nbsp;Cancel
                    </a>

                </div>
            </div>

</body>

</html>