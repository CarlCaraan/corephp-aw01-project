<?php
require("../app/config/connect.php");
include("../classes/User.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account | App</title>
    <meta name="description" content="WEB AND DATABASE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--   <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico"> -->

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="../resources/css/toastr.min.css">

</head>

<body>
    <?php
    $toggle_active = "account";
    ?>

    <!-- Left Panel -->
    <?php
    include "./body/sidebar.php"
    ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
        include "./body/header.php"
        ?>
        <!-- Header-->



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Account&nbsp
                            &nbsp&nbsp
                            <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp&nbspADD ACCOUNT</i>
                            </button>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <?php
            $sql = "SELECT * FROM users INNER JOIN personal ON personal.user_id = users.id";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body pb-0">

                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-dark">
                                            <div class="media">
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="../resources/img/uploads/<?php echo ($row['image'] != "") ? $row['image'] : 'default.jpg'; ?>">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="text-light display-6">
                                                        <?php echo $row['first_name']; ?>
                                                        <?php echo $row['last_name']; ?>
                                                    </h4>
                                                    <p><?php echo $row['usertype']; ?></p>
                                                    <p>Joined: <?php echo $row['signup_date']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="#"> Email:
                                                    <?php echo $row['email']; ?>
                                                    <span class="badge badge-primary pull-right"></span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-tasks"></i> Account Status:
                                                    <!-- <span class="badge badge-danger pull-right">15</span> -->
                                                    <?php echo $row['status']; ?>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <center>
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view<?php echo $row['id'] ?>"><i class="fa fa-eye"></i> </button>
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#approved<?php echo $row['id'] ?>"><i class="fa fa-check"></i></button>
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reject<?php echo $row['id'] ?>"><i class="fa fa-times"></i></button>
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
                                                </center>
                                            </li>
                                        </ul>

                                    </section>
                                </aside>
                            </div>

                        </div>
                    </div>

                    <!-- modal view -->
                    <div class="modal fade" id="view<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Costumer Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-header">
                                        <strong class="card-title">Personal Information</strong>
                                    </div><br />
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <aside class="profile-nav alt">
                                                <section class="card">
                                                    <div class="card-header user-header alt bg-dark">
                                                        <div class="media">
                                                            <a href="#">
                                                                <img class="align-self-center rounded-circle mr-3" style="width:125px; height:135px;" alt="" src="">
                                                            </a>
                                                            <div class="media-body">
                                                                <h2 class="text-light display-6"><?php echo $row['first_name'] . " " . $row['last_name'] ?></h2>
                                                                <p><?php echo $row['usertype'] ?><br />
                                                                    <?php echo $row['mobile'] ?><br />
                                                                    Birthday: <?php echo $row['dob'] ?><br />
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </section>
                                            </aside>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="p_address" name="p_address" type="text" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Email Address" disabled><br />
                                            <input id="p_address" name="p_address" type="text" class="form-control" value="<?php echo $row['address'] ?>" placeholder="Permanent Address" disabled><br />
                                        </div>
                                    </div>

                                    <strong class="card-title">Company Information</strong>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label></label>
                                            <input id="t_number" name="t_number" type="text" class="form-control" value="<?php echo $row['company_affiliated'] ?>" placeholder="Company Affiliated With" disabled>
                                            <label></label>
                                            <input id="status" name="status" type="text" class="form-control" value="<?php echo $row['company_address'] ?>" placeholder="Company Address" disabled>
                                        </div>
                                        <div class="col-sm-6">
                                            <label></label>
                                            <input id="age" name="age" type="text" class="form-control" value="<?php echo $row['company_number'] ?>" placeholder="Company Contact Number" disabled>
                                            <label></label>
                                            <input id="gender" name="gender" type="text" class="form-control" value="<?php echo $row['work_status'] ?>" placeholder="Work Status" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal view -->

                    <!-- modal approved -->
                    <div class="modal fade" id="approved<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Approved Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p align="center">Are you sure? You want to approved this Account?</p>
                                    <div class="modal-footer">
                                        <a href="../app/controllers/admin_backend/Account/approve_handler.php?id=<?php echo $row['user_id']; ?>" class="btn btn-secondary">YES</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end modal approved -->

                    <!-- modal reject -->
                    <div class="modal fade" id="reject<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Reject Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p align="center">Are you sure? You want to Reject this Account?</p>
                                    <div class="modal-footer">
                                        <a href="../app/controllers/admin_backend/Account/reject_handler.php?id=<?php echo $row['user_id']; ?>" class="btn btn-secondary">YES</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end modal reject -->

                    <!-- modal delete -->
                    <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Delete Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p align="center">Are you sure? You want to Delete this Account?</p>
                                    <div class="modal-footer">
                                        <a href="../app/controllers/admin_backend/Account/delete_handler.php?id=<?php echo $row['user_id']; ?>" class="btn btn-secondary">YES</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end modal delete -->

            <?php
                }
            } else {
                echo "0 results";
            }
            $con->close();
            ?>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <!-- Toastr JS -->
    <script src="../resources/js/toastr.min.js"></script>
    <script>
        <?php if (isset($_SESSION['success'])) : ?>
            toastr.success("<?php echo flash('success'); ?>");
        <?php endif ?>
        <?php if (isset($_SESSION['error'])) : ?>
            toastr.error("<?php echo flash('error'); ?>");
        <?php endif ?>
        <?php if (isset($_SESSION['warning'])) : ?>
            toastr.warning("<?php echo flash('warning'); ?>");
        <?php endif ?>
        <?php if (isset($_SESSION['info'])) : ?>
            toastr.info("<?php echo flash('info'); ?>");
        <?php endif ?>
    </script>

    <!-- <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> -->

    <!-- start modal add -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../app/controllers/admin_backend/Account/add_handler.php" method="POST">
                        <div class="card-header">
                            <strong class="card-title">Fill up Information</strong>
                        </div><br />
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="first_name" class="control-label mb-1">First Name*</label>
                                <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-sm-3">
                                <label for="last_name" class="control-label mb-1">Last Name*</label>
                                <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-sm-3">
                                <label for="email" class="control-label mb-1">Email Address*</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="col-sm-3">
                                <label for="select" class="control-label mb-1">User Type*</label>
                                <select class="form-control" name="usertype">
                                    <option value="none" selected>Select User Type</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Branch Manager">Branch Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="add_account">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Clear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal add -->

</body>

</html>