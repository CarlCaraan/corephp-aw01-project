<?php
if (isset($_POST['login_button'])) {
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email
    $_SESSION['log_email'] = $email; //Store email into session variable
    $password = md5($_POST['log_password']); //Get password

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    $check_status_query = mysqli_query($con, "SELECT status FROM users");
    $row = mysqli_fetch_array($check_status_query);
    $status = $row['status'];

    $check_position = mysqli_query($con, "SELECT position FROM users");
    $get_postion = mysqli_fetch_array($check_position);
    $position = $get_postion['position'];


    if ($status == "no") {
        array_push($error_array, "Your account is not yet approved!<br>");
    }
    else if ($status == "rejected") {
        array_push($error_array, "Your account have been rejected!<br>");
    }
    else if ($check_login_query == 1 && $position=="Admin") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        header("Location: admin/dashboard.php");
        exit();

    } else if ($check_login_query == 1 && $position=="Branch Manager") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        header("Location: branch_manager/dashboard.php");
        exit();
        
    } else if ($check_login_query == 1 && $position=="Staff") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        header("Location: staff/dashboard.php");
        exit();
    } else {
        array_push($error_array, "Email or password was incorrect<br>");
    } //End login query
}
