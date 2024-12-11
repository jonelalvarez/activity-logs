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
    <title>User Accounts | Astronaut Management</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="card col-10 mx-auto mt-3" style="border-color: #0b3d91">
        <div class="card-header" style="background-color: #0b3d91; color:white">

            <h4>All Users</h4>
        </div>
        <div class="card-body col-12 mx-auto">
            <div class="table-responsive">
                <table id="usersTable" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $getAllUsers = getAllUserAccounts($pdo); ?>
                        <?php foreach ($getAllUsers as $row) { ?>
                            <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['date_added']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#usersTable').DataTable({
                "pageLength": 10, // Default rows per page
                "lengthMenu": [5, 10, 25, 50], // Rows per page options
                "searching": true, // Enable search
                "ordering": true, // Enable column sorting
                "info": true, // Show table info
                "paging": true // Enable pagination
            });
        });
    </script>
</body>

</html>