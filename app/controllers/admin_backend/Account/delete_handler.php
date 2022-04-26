<?php
require_once '../../../config/connect.php';
include '../../flash_message.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    $sql1 = "DELETE FROM personal WHERE user_id='$id'";

    if ($con->query($sql) === TRUE && $con->query($sql1) === TRUE) {
        flash("success", "User Deleted Succesfully!");

        // echo "Record updated successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
