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
    <title>Edit Profile</title>
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
        <div class="card-header" style="background-color: #0b3d91; color:white">
            <?php $getUserByID = getUserByID($pdo, $_GET['astronaut_id']); ?>
            <h3><i class="fas fa-user-astronaut fa-lg"></i>&nbsp;&nbsp;Edit the user!</h3>

        </div>
        <div class="card-body col-12 mx-auto">
            <form action="core/handleForms.php?astronaut_id=<?php echo $_GET['astronaut_id']; ?>" method="POST">

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name"
                        value="<?php echo $getUserByID['first_name']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name"
                        value="<?php echo $getUserByID['last_name']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="suffix" class="form-label">Suffix</label>
                    <input type="text" class="form-control" name="suffix" value="<?php echo $getUserByID['suffix']; ?>"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="bdate" class="form-label">Birthdate</label>
                    <input type="text" class="form-control" name="bdate" value="<?php echo $getUserByID['bdate']; ?>"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" name="gender" value="<?php echo $getUserByID['gender']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nationality" class="form-label">Country</label>
                    <input type="text" class="form-control" name="nationality"
                        value="<?php echo $getUserByID['nationality']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $getUserByID['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $getUserByID['status']; ?>">
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <button class="btn" style="background-color: #105bd8; color: white" name="editUserBtn">
                            <i class="fas fa-save fa-lg"></i>&nbsp;&nbsp;Save
                        </button>
                    </div>
            </form>
            <div>
                <a href="index.php" class="btn" style="background-color: #dd361c; color: white; text-decoration: none;">
                    <i class="fas fa-sign-out-alt fa-lg"></i>&nbsp;&nbsp;Cancel
                </a>

            </div>
        </div>
</body>

</html>