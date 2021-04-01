<?php

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include 'partials/header.php';
include 'partials/sidebar.php';

include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    echo mysqli_error($connection);
    throw new Exception("Database cannot Connect");
}
$query = "SELECT * FROM users WHERE user_type='teacher'";
$result = mysqli_query($connection, $query);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Teachers</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $class) { ?>
                    <tr>
                        <td><?php echo $class['name']; ?> </td>
                        <td><?php echo $class['email']; ?> </td>
                        <td><?php echo $class['dob']; ?> </td>
                        <td><?php echo $class['address']; ?> </td>
                        <td><?php echo $class['gender']; ?> </td>
                        <td><?php echo $class['user_type']; ?> </td>

                        <td>
                            <a href="edit_user.php?id=<?= $class['id'] ?>"><button type="submit" class="btn btn-danger">Edit</button></a>
                            <form method="post" onclick="return confirm('Are you sure?')" action="deleteTeacher.php?id=<?= $class['id'] ?>">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <!-- /.content -->
</div>


<?php



include 'partials/footer.php';
?>