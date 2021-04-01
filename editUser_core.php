<?php

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
}

include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    throw new Exception("Database cannot Connect");
}

$action = $_REQUEST['action'] ?? '';

if ('addUser' == $action) {
    $id = $_REQUEST['id'] ?? '';
    $name = $_REQUEST['name'] ?? '';
    $dob = $_REQUEST['dob'] ?? '';
    $gender = $_REQUEST['gender'] ?? '';
    $address = $_REQUEST['address'] ?? '';
    $phone_no = $_REQUEST['phone_no'] ?? '';
    $email = $_REQUEST['email'] ?? '';

    if ($name && $dob && $address && $phone_no && $email && $gender) {

        $query = "UPDATE users SET name='$name', dob='$dob', gender='$gender', address='$address', email='$email', phone_no='$phone_no' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
    }
}
