<?php

include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    throw new Exception("Database cannot Connect");
}
$query = "DELETE FROM classes WHERE id='{$_GET['id']}'";
$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: classes.php");
}
