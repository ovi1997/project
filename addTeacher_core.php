<?php

ob_start();

$name = "";
$err_name = "";
$email = "";
$err_email = "";
$dob = "";
$err_dob = "";
$address = "";
$err_address = "";
$gender = "";
$err_gender = "";
$phone_no = "";
$err_phone_no = "";
$pass = "";
$err_pass = "";
$confirm_pass = "";
$err_confirm_pass = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $err_name = "Name Required";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["address"])) {
        $err_address = "Addres Required";
    } else {
        $address = $_POST["address"];
    }
    if (empty($_POST["phone_no"])) {
        $err_phone_no = "Phone Number Required";
    } else {
        $phone_no = $_POST["phone_no"];
    }
    if (empty($_POST["dob"])) {
        $err_dob = "Date of Birth Required";
    } else {
        $dob = $_POST["dob"];
    }
    if (empty($_POST["email"])) {
        $err_email = "Email Required";
    } elseif (strpos($_POST["email"], " ")) {
        $err_email = "Username should not contain white space";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $err_pass = "Password Required";
    } else {
        $pass = $_POST["password"];
    }
    if (empty($_POST["confirm_password"])) {
        $err_confirm_pass = "Confirm Password Required";
    } else {
        $confirm_pass = $_POST["confirm_password"];
    }
}

include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    echo mysqli_error($connection);
    throw new Exception("Database cannot Connect");
}

$action = $_REQUEST['action'] ?? '';

if ('addManager' == $action) {

    $name = $_REQUEST['name'] ?? '';
    $dob = $_REQUEST['dob'] ?? '';
    $gender = $_REQUEST['gender'] ?? '';
    $address = $_REQUEST['address'] ?? '';
    $phone_no = $_REQUEST['phone_no'] ?? '';
    $email = $_REQUEST['email'] ?? '';
    $password = $_REQUEST['password'] ?? '';
    $con_password = $_REQUEST['confrim_password'] ?? '';

    if ($password == $con_password) {

        if ($name && $dob && $address && $phone_no && $email && $password) {
            $has_password = md5($password);
            $query = "INSERT INTO users (name, dob, gender, address, email, phone_no, password, user_type) VALUES ('$name', '$dob', '$gender', '$address', '$email', '$phone_no', '$has_password', 'teacher')";
            $result = mysqli_query($connection, $query);
        }
    }
}
ob_end_flush();
