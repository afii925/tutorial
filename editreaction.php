<?php
$ID = $_POST['title'];

include 'database.php';

$title = mysqli_real_escape_string($conn, $ID);

$id = $_POST['id'];

$sql = "UPDATE todos SET title='$title' WHERE id=$id";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: ./index.php");
}
?>