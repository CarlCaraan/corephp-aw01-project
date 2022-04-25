<?php
require_once '../config/connect.php';
include './flash_message.php';

$userLoggedIn = $_SESSION['username'];

//For Password Form
if (isset($_POST['update_password'])) {
    $current_password = strip_tags($_POST['current_password']);
    $new_password = strip_tags($_POST['new_password']);
    $confirm_password = strip_tags($_POST['confirm_password']);

    $password_query = mysqli_query($con, "SELECT password FROM users WHERE username='$userLoggedIn'");
    $row = mysqli_fetch_array($password_query);
    $db_password = $row['password'];

    if (md5($current_password) == $db_password) {
        if ($new_password == $confirm_password) {
            if (strlen($new_password) <= 4) {
                flash("error", "Sorry your password must be greater than 4 characters!");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $new_password_md5 = md5($new_password);
                $password_query = mysqli_query($con, "UPDATE users SET password='$new_password_md5' WHERE username='$userLoggedIn'");

                flash("success", "Your Password has been changed!");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            flash("error", "Your New Password doesn't match!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        flash("error", "Your Current Password is incorrect!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
