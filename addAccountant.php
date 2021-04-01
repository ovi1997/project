<?php

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include 'partials/header.php';
include 'partials/sidebar.php';

include 'addAccountant_core.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Accountant</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">Name</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="First name">
                    <div class="valid-tooltip">

                    </div>
                    <?php echo $err_name; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">DOB</label>
                    <input type='date' class="form-control" id="validationTooltip02" name="dob" placeholder="Last name">
                    <div class="valid-tooltip">

                    </div>
                    <?php echo $err_dob; ?>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="validationTooltipUsername">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="validationTooltipUsername" name="email" placeholder="Email">
                        <div class="invalid-tooltip">

                        </div>
                        <?php echo $err_email; ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Address</label>
                    <input type="text" class="form-control" id="validationTooltip03" name="address" placeholder="City">
                    <div class="invalid-tooltip">

                    </div>
                    <?php echo $err_address; ?>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1">Gender: </label>
                    <span><?php echo $err_gender; ?></span>
                </div>
                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="gender" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">Phone No</label>
                    <input type="number" class="form-control" id="validationTooltip04" name="phone_no" placeholder="Phone No">
                    <div class="invalid-tooltip">

                    </div>
                    <?php echo $err_phone_no; ?>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Password</label>
                    <input type="password" class="form-control" id="myInput" name="password" placeholder="password">
                    <input type="checkbox" onclick="myFunction()">Show Password
                    <div class="invalid-tooltip">

                    </div>
                    <?php echo $err_pass; ?>
                </div>
                <input type="hidden" name="action" value="addManager">
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Conmfirm Password</label>
                    <input type="password" class="form-control" id="myInput2" name="confrim_password" placeholder="Zip">
                    <input type="checkbox" onclick="myFunction2()">Show Password
                    <div class="invalid-tooltip">

                    </div>
                    <?php echo $err_confirm_pass; ?>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Add Accountant</button>
        </form>
    </section>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
include 'partials/footer.php';
?>