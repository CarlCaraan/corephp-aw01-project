<?php
require_once '../config/connect.php';
include '../controllers/flash_message.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM notifications WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        flash("success", "Notification Deleted Successfully!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
