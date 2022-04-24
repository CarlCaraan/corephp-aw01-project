<?php
if (isset($_POST['login_button'])) {
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email
    $_SESSION['log_email'] = $email; //Store email into session variable
    $password = md5($_POST['log_password']); //Get password

    // Verify Email and Password
    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    // Verify Status and Position
    $check_data_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_array($check_data_query);
    $status = $row['status'];
    $position = $row['position'];

    if ($status == "Pending") {
        array_push($error_array, "Your account is not yet approved!<br>");
    } else if ($status == "Rejected") {
        array_push($error_array, "Your account have been rejected!<br>");
    } else if ($check_login_query == 1 && $position == "Admin") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        header("Location: admin/dashboard");
        exit();
    } else if ($check_login_query == 1 && $position == "Branch Manager") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        header("Location: branch_manager/dashboard");
        exit();
    } else if ($check_login_query == 1 && $position == "Staff") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        header("Location: staff/dashboard");
        exit();
    } else {
        array_push($error_array, "Email or password was incorrect<br>");
    } //End login query
}
