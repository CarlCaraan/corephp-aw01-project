<?php
require_once '../../../config/connect.php';
include '../flash_message.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE users SET status='Rejected' WHERE id='$id'";

    // Check User if approved
    $check_user_status = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
    $row = mysqli_fetch_array($check_user_status);
    $status = $row['status'];

    if ($status == "Rejected") {
        flash("warning", "User is Already Rejected!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if ($con->query($sql) === TRUE) {
        flash("success", "User Rejected Succesfully!");

        // echo "Record updated successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
