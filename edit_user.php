<?php
session_start();
include 'partials/header.php';
include 'partials/sidebar.php';
include 'editUser_core.php';


include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    echo mysqli_error($connection);
    throw new Exception("Database cannot Connect");
}


$query = "SELECT * FROM users WHERE id='{$_GET['id']}'";
$result = mysqli_query($connection, $query);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <?php foreach ($result as $user) { ?>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $user['name']; ?>" name="name" placeholder="First name">
                        <div class="valid-tooltip">

                        </div>
                        <?php echo $err_name; ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">DOB</label>
                        <input type='date' class="form-control" id="validationTooltip02" value="<?php echo $user['dob']; ?>" name="dob" placeholder="Last name">
                        <div class="valid-tooltip">

                        </div>
                        <?php echo $err_dob; ?>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="validationTooltipUsername" value="<?php echo $user['email']; ?>" name="email" placeholder="Email">
                            <div class="invalid-tooltip">

                            </div>
                            <?php echo $err_email; ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Address</label>
                        <input type="text" class="form-control" id="validationTooltip03" value="<?php echo $user['address']; ?>" name="address" placeholder="City">
                        <div class="invalid-tooltip">

                        </div>
                        <?php echo $err_address; ?>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Gender: </label>
                        <span><?php echo $err_gender; ?></span>
                    </div>
                    <?php if ($user['gender'] == 'male') { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked type="radio" name="gender" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    <?php } ?>
                    <?php if ($user['gender'] == 'female') { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked type="radio" name="gender" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>

                    <?php } ?>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Phone No</label>
                        <input type="number" class="form-control" value="<?php echo $user['phone_no']; ?>" id="validationTooltip04" name="phone_no" placeholder="Phone No">
                        <div class="invalid-tooltip">

                        </div>
                        <?php echo $err_phone_no; ?>
                    </div>

                    <!--div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Password</label>
                        <input type="password" class="form-control" id="myInput" name="password" placeholder="password">
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <div class="invalid-tooltip">

                        </div>
                        
                    </div-->
                    <input type="hidden" name="action" value="addUser">
                    <!--div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Conmfirm Password</label>
                        <input type="password" class="form-control" id="myInput2" name="confrim_password" placeholder="Zip">
                        <input type="checkbox" onclick="myFunction2()">Show Password
                        <div class="invalid-tooltip">

                        </div>
                        
                    </div-->
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            <?php } ?>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--  <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer> -->
<?php
include 'partials/footer.php';
?>