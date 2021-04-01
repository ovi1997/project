<?php


ob_start();


$class_name = "";
$err_class_name = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["class_name"])) {
        $err_class_name = "Class Name Required";
    } else {
        $class_name = $_POST["class_name"];
    }
}


include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    echo mysqli_error($connection);
    throw new Exception("Database cannot Connect");
}

$action = $_REQUEST['action'] ?? '';

if ('addClass' == $action) {

    $class_name = $_REQUEST['class_name'] ?? '';

    if ($class_name) {
        $query = "INSERT INTO classes (class_name) VALUES ('$class_name')";
        $result = mysqli_query($connection, $query);
    }
}
ob_end_flush();
