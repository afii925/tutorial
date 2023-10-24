<?php
include 'database.php';
$id = $_GET['id'];

$id = filter_var($id, FILTER_VALIDATE_INT);

if ($id !== false) {

    $sql = "DELETE FROM todos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result) {
            header("location: ./index.php");
        }
    }
}

?>