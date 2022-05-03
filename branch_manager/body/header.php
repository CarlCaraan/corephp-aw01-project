<?php
//Stop access when not logged in!
if (isset($_SESSION['username'])) {
    // Session Username
    $userLoggedIn = $_SESSION['username'];

    //$user is to select all data from users table
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);

    // Session Id
    $id = $user['id'];
    $_SESSION['id'] = $id;

    //Authorized for Admin only
    if ($user["usertype"] == "Branch Manager") {
        define('USERSITE', true);
    }
} else {
    header("Location: ../login");
}

//Authorized for Admin only
if (!defined('USERSITE')) {
    header("refresh:0;url=../app/controllers/auth/logout_handler.php");
    die();
}

// Flash Message
include("../app/controllers/flash_message.php");
?>



<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
                <?php
                $get_total_notification = mysqli_query($con, "SELECT * FROM notifications WHERE seen_status='0'");
                $get_total_notification = mysqli_num_rows($get_total_notification);
                if ($get_total_notification == 0) {
                    $count_badge = "";
                } else {
                    $count_badge = "count";
                }
                ?>
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle notification-button" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="<?php echo $count_badge; ?> notification-count bg-danger"></span>
                    </button>
                    <div class="dropdown-menu notification-content" aria-labelledby="notification">
                        <!-- <p class="red">You have 3 Notification</p> -->
                        <!-- <a class="dropdown-item media bg-flat-color-1" href="#">
                            <i class="fa fa-check"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media bg-flat-color-4" href="#">
                            <i class="fa fa-info"></i>
                            <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media bg-flat-color-5" href="#">
                            <i class="fa fa-warning"></i>
                            <p>Server #3 overloaded.</p>
                        </a> -->
                    </div>
                </div>

                <!-- <div class="dropdown for-message">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-email"></i>
                        <span class="count bg-primary">9</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="message">
                        <p class="red">You have 4 Mails</p>
                        <a class="dropdown-item media bg-flat-color-1" href="#">
                            <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                            <span class="message media-body">
                                <span class="name float-left">Jonathan Smith</span>
                                <span class="time float-right">Just now</span>
                                <p>Hello, this is an example msg</p>
                            </span>
                        </a>
                        <a class="dropdown-item media bg-flat-color-4" href="#">
                            <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                            <span class="message media-body">
                                <span class="name float-left">Jack Sanders</span>
                                <span class="time float-right">5 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </span>
                        </a>
                        <a class="dropdown-item media bg-flat-color-5" href="#">
                            <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                            <span class="message media-body">
                                <span class="name float-left">Cheryl Wheeler</span>
                                <span class="time float-right">10 minutes ago</span>
                                <p>Hello, this is an example msg</p>
                            </span>
                        </a>
                        <a class="dropdown-item media bg-flat-color-3" href="#">
                            <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                            <span class="message media-body">
                                <span class="name float-left">Rachel Santos</span>
                                <span class="time float-right">15 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </span>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>
                        <?php
                        $fullname_obj = new User($con, $userLoggedIn);
                        echo $fullname_obj->getFirstAndLastName();
                        ?>
                    </span>
                    <img class="user-avatar rounded ml-2" src="../resources/img/uploads/<?php $avatar_obj = new User($con, $userLoggedIn);
                                                                                        echo ($avatar_obj->getAvatar() != NULL) ?
                                                                                            $avatar_obj->getAvatar() : "/default.jpg";
                                                                                        ?>" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="./profile"><i class="fa fa-user"></i> My Profile</a>

                    <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                    <a class="nav-link" href="../app/controllers/auth/logout_handler.php"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>


        </div>
    </div>

</header><!-- /header -->

<!-- Start Notification Functions -->
<script type="text/javascript">
    $(document).ready(function() {

        // Fetch notification
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "../app/ajax_notifications/fetch_notification.php",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('.notification-content').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.notification-count').html(data.unseen_notification);
                    }
                }
            });
        }

        load_unseen_notification();

        // Remove number in notification
        $(document).on('click', '.notification-button', function() {
            $('.notification-count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();;
        }, 5000);

    });
</script>
<!-- End Notification Functions -->