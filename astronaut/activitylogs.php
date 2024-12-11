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
    <title>Activity Logs</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="card col-10 mx-auto mt-3" style="border-color: #0b3d91">
        <div class="card-header" style="background-color: #0b3d91; color: white">
            <h4>Activity Logs</h4>




        </div>
        <div class="card-body col-12 mx-auto">
            <div class="tableClass">
                <table id="logsTable" class="col-md-12 table table-striped">
                    <tr>
                        <th>Activity Log ID</th>
                        <th>Operation</th>
                        <th>Branch ID</th>
                        <th>Address</th>
                        <th>Head Manager</th>
                        <th>Contact Number</th>
                        <th>Update by:</th>
                        <th>Date Added</th>
                    </tr>
                    <?php $getAllActivityLogs = getAllActivityLogs($pdo); ?>
                    <?php foreach ($getAllActivityLogs as $row) { ?>
                        <tr>
                            <td><?php echo $row['activity_log_id']; ?></td>
                            <td><?php echo $row['operation']; ?></td>
                            <td><?php echo $row['branch_id']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['head_manager']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['date_added']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>


        </div>
    </div>

</body>

</html>