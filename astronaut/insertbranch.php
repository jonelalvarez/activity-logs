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
    <title>Add branch | Astronaut Management System</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="card mt-3 mb-3 col-md-10 mx-auto" style="border-color: #0b3d91">
        <div class="card-header" style="background-color: #0b3d91; color: white">
            <h4>Add Branch Form</h4>
        </div>
        <div class="card-body">
            <form action="core/handleForms.php" method="POST">
                <div class="row align-items-center">
                    <!-- Address -->
                    <div class="col-md-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address">
                    </div>
                    <!-- Head Manager -->
                    <div class="col-md-4">
                        <label for="head_manager" class="form-label">Head Manager</label>
                        <input type="text" class="form-control" name="head_manager" placeholder="Enter Head Manager">
                    </div>
                    <!-- Contact Number -->
                    <div class="col-md-4">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number"
                            placeholder="Enter Contact Number">
                    </div>
                    <!-- Submit Button -->
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn w-100" style="background-color:#0b3d91; color:white"
                            name="insertNewBranchBtn" value="Create">
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="card col-10 mx-auto mt-3" style="border-color: #0b3d91">

        <div class="card-body col-12 mx-auto">

            <div class="table-responsive">
                <table id="branchesTable" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Head Manager</th>
                            <th>Contact Number</th>
                            <th>Date Added</th>
                            <th>Added By</th>
                            <th>Last Updated</th>
                            <th>Last Updated By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!isset($_GET['searchBtn'])) { ?>
                            <?php $getAllBranches = getAllBranches($pdo); ?>
                            <?php foreach ($getAllBranches as $row) { ?>
                                <tr>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['head_manager']; ?></td>
                                    <td><?php echo $row['contact_number']; ?></td>
                                    <td><?php echo $row['date_added']; ?></td>
                                    <td><?php echo $row['added_by']; ?></td>
                                    <td><?php echo $row['last_updated']; ?></td>
                                    <td><?php echo $row['last_updated_by']; ?></td>
                                    <td>
                                        <a href="updatebranch.php?branch_id=<?php echo $row['branch_id']; ?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <?php $getAllBranchesBySearch = getAllBranchesBySearch($pdo, $_GET['searchQuery']); ?>
                            <?php foreach ($getAllBranchesBySearch as $row) { ?>
                                <tr>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['head_manager']; ?></td>
                                    <td><?php echo $row['contact_number']; ?></td>
                                    <td><?php echo $row['date_added']; ?></td>
                                    <td><?php echo $row['added_by']; ?></td>
                                    <td><?php echo $row['last_updated']; ?></td>
                                    <td><?php echo $row['last_updated_by']; ?></td>
                                    <td>
                                        <a href="updatebranch.php?branch_id=<?php echo $row['branch_id']; ?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#astronautTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50],
                "paging": true,
                "info": true,
                "searching": false,
                "ordering": true
            });
        });
    </script>
</body>

</html>