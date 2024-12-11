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
    <title>Home | Astronaut Management System</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .btn:hover {
            color: #fff;
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }
    </style>
</head>

<body>

    <!-- RESPONSE MESSAGE for bootstrap-->
    <?php if (isset($_SESSION['message'])) { ?>
        <script>
            Swal.fire({
                icon: '<?php echo isset($_SESSION['status']) && $_SESSION['status'] === 'success' ? 'success' : 'error'; ?>',
                title: '<?php echo $_SESSION['message']; ?>',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        <?php unset($_SESSION['message'], $_SESSION['status']);
    } ?>
    <!-- navbar -->
    <?php include 'navbar.php'; ?>


    <h3 class="mx-auto text-center mt-5" style="color: #0b3d91">Welcome to Astronaut Management System, <span
            style="color: #dd361c;"><?php echo $_SESSION['username']; ?></span>!</h3>
    <div class="card col-10 mx-auto mt-3" style="border-color: #0b3d91">
        <div class="card-header" style="background-color: #0b3d91;">
            <button class="btn" style="background-color: #105bd8; color: white" onclick="location.href='insert.php'">
                <i class="fas fa-user-astronaut fa-lg"></i>&nbsp;&nbsp;Add New
            </button>
            <button class="btn" style="background-color: #105bd8; color: white"
                onclick="location.href='insertbranch.php'">
                <i class="fas fa-code-branch fa-lg"></i>&nbsp;&nbsp;Add Branch
            </button>




        </div>
        <div class="card-body col-12 mx-auto">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <!-- <input type="text" name="searchInput" placeholder="Search here">
                <input type="submit" name="searchBtn"> -->

                <div class=" input-group mb-3 mt-3">
                    <!-- Search input -->
                    <input type="text" class="form-control" style="border-color: #0b3d91" name="searchInput"
                        placeholder="Search here">
                    <!-- Search button -->
                    <button class="btn" style="background-color: #0b3d91; color: #dd361c" type="submit"
                        name="searchBtn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </form>
            <p style="text-align: right;">
                <a href="index.php">Clear Search</a>
            </p>
            <table id="astronautTable" class="col-md-12 table table-striped">
                <thead>
                    <tr>
                        <th>Astronaut ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Suffix</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!isset($_GET['searchBtn'])) { ?>
                        <?php $getAllUsers = getAllUsers($pdo); ?>
                        <?php foreach ($getAllUsers as $row) { ?>
                            <tr>
                                <td><?php echo $row['astronaut_id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['suffix']; ?></td>
                                <td><?php echo $row['bdate']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['nationality']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm"
                                        onclick="location.href='edit.php?astronaut_id=<?php echo $row['astronaut_id']; ?>'">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="location.href='delete.php?astronaut_id=<?php echo $row['astronaut_id']; ?>'">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php } else { ?>
                        <?php $searchForAUser = searchForAUser($pdo, $_GET['searchInput']); ?>
                        <?php foreach ($searchForAUser as $row) { ?>
                            <tr>
                                <td><?php echo $row['astronaut_id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['suffix']; ?></td>
                                <td><?php echo $row['bdate']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['nationality']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm"
                                        onclick="location.href='edit.php?astronaut_id=<?php echo $row['astronaut_id']; ?>'">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="location.href='delete.php?astronaut_id=<?php echo $row['astronaut_id']; ?>'">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>

                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
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