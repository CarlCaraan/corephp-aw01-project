<?php
require("../app/config/connect.php");
include("../classes/User.php");
include("../app/controllers/admin_backend/flash_message.php")
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
            $sql = "SELECT * FROM users";
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
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="text-light display-6">
                                                        <?php echo $row['first_name']; ?>
                                                        <?php echo $row['last_name']; ?>
                                                    </h4>
                                                    <p><?php echo $row['position']; ?></p>
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
                                                                <img class="align-self-center rounded-circle mr-3" style="width:125px; height:135px;" alt="" src="images/admin.jpg">
                                                            </a>
                                                            <div class="media-body">
                                                                <h2 class="text-light display-6"><?php echo $row['first_name'] . " " . $row['last_name'] ?></h2>
                                                                <p><?php echo $row['position'] ?><br />09304895235<br />Birthday</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </section>
                                            </aside>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="p_address" name="p_address" type="text" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Email Address" disabled><br />
                                            <input id="p_address" name="p_address" type="text" class="form-control" value="" placeholder="Permanent Address" disabled><br />
                                        </div>
                                    </div>

                                    <strong class="card-title">Company Information</strong>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label></label>
                                            <input id="t_number" name="t_number" type="text" class="form-control" placeholder="Company Affiliated With" disabled>
                                            <label></label>
                                            <input id="status" name="status" type="text" class="form-control" placeholder="Company Address" disabled>
                                        </div>
                                        <div class="col-sm-6">
                                            <label></label>
                                            <input id="age" name="age" type="text" class="form-control" placeholder="Company Contact Number" disabled>
                                            <label></label>
                                            <input id="gender" name="gender" type="text" class="form-control" placeholder="Work Status" disabled>
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
                                        <a href="../app/controllers/admin_backend/Account/approve_handler.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">YES</a>
                                        <a href="" class="btn btn-danger">NO</a>
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
                                    <h5 class="modal-title" id="mediumModalLabel">Approved Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <p align="center">Are you sure? You want to Reject this Account?</p>

                                    <div class="modal-footer">
                                        <a href="../app/controllers/admin_backend/Account/reject_handler.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">YES</a>
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
                                    <h5 class="modal-title" id="mediumModalLabel">Approved Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <p align="center">Are you sure? You want to Delete this Account?</p>

                                    <div class="modal-footer">
                                        <a href="../app/controllers/admin_backend/Account/delete_handler.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">YES</a>
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
                    <h5 class="modal-title" id="mediumModalLabel">Add Costumer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="">
                        <div class="card-header">
                            <strong class="card-title">Personal Information</strong>
                        </div><br />
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="lname" class="control-label mb-1">Lastname*</label>
                                <input id="lname" name="lname" type="text" class="form-control" placeholder="Lastname here!">
                            </div>
                            <div class="col-sm-3">
                                <label for="fname" class="control-label mb-1">Firstname</label>
                                <input id="fname" name="fname" type="text" class="form-control" placeholder="Firstname here!">
                            </div>
                            <div class="col-sm-3">
                                <label for="mname" class="control-label mb-1">Middle Name</label>
                                <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename here!">
                            </div>
                            <!--  <div class="col-sm-3">
                                              <label for="mname" class="control-label mb-1">Catteg</label>
                                              <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename here!">
                                        </div> -->

                            <div class="col-sm-3">
                                <label for="select" class="control-label mb-1">Categories</label>
                                <select name="select" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="atm">ATM</option>
                                    <option value="sps">SPS</option>
                                    <option value="spsv1">SPSV1</option>
                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="p_address" class="control-label mb-1">Permanent Address</label>
                                <input id="p_address" name="p_address" type="text" class="form-control" placeholder="Permanent Address here!">
                            </div>
                            <div class="col-sm-6">
                                <label for="e_address" class="control-label mb-1">Email Address</label>
                                <input id="e_address" name="e_address" type="text" class="form-control" placeholder="Email Address here!">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <label for="bday" class="control-label mb-1">Date of Birth</label>
                                <input id="bday" name="bday" type="text" class="form-control" placeholder="Birthday here!">
                            </div>
                            <div class="col-sm-4">
                                <label for="t_number" class="control-label mb-1">Telephone/Mobile Number</label>
                                <input id="t_number" name="t_number" type="text" class="form-control" placeholder="Telephone/Mobile Number here!">
                            </div>
                            <div class="col-sm-4">
                                <label for="id_card" class="control-label mb-1">ID Card Number</label>
                                <input id="id_card" name="id_card" type="text" class="form-control" placeholder="ID Card Number here!">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="mother" class="control-label mb-1">Mother's Name</label>
                                <input id="mother" name="mother" type="text" class="form-control" placeholder="Mother's Name here!">
                                <label for="father" class="control-label mb-1">Father's Name</label>
                                <input id="father" name="father" type="text" class="form-control" placeholder="Father's Name here!">
                                <label for="spouse" class="control-label mb-1">Name of Spouse</label>
                                <input id="spouse" name="spouse" type="text" class="form-control" placeholder="Name of Spouse here!">
                            </div>
                            <div class="col-sm-6">
                                <label for="c_person" class="control-label mb-1">Contact Person</label>
                                <input id="c_person" name="c_person" type="text" class="form-control" placeholder="Contact Person here!">
                                <label for="contact" class="control-label mb-1">Contact Number</label>
                                <input id="contact" name="contact" type="text" class="form-control" placeholder="Contact Number here!">
                                <label for="s_number" class="control-label mb-1">Spouse Contact Number</label>
                                <input id="s_number" name="s_number" type="text" class="form-control" placeholder="Spouse Contact Number here!">
                            </div>
                        </div><br />

                        <div class="card-header">
                            <strong class="card-title">Company Information</strong>
                        </div><br />
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="c_affiliated" class="control-label mb-1">Company Affiliated With</label>
                                <input id="c_affiliated" name="c_affiliated" type="text" class="form-control" placeholder="Lastname here!">
                            </div>
                            <div class="col-sm-4">
                                <label for="c_address" class="control-label mb-1">Company Address</label>
                                <input id="c_address" name="c_address" type="text" class="form-control" placeholder="Firstname here!">
                            </div>
                            <div class="col-sm-4">
                                <label for="c_number" class="control-label mb-1">Company Contact Number</label>
                                <input id="c_number" name="c_number" type="text" class="form-control" placeholder="Middlename here!">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="position" class="control-label mb-1">Position/Occupation</label>
                                <input id="position" name="position" type="text" class="form-control" placeholder="Permanent Address here!">
                            </div>
                            <div class="col-sm-6">
                                <label for="w_status" class="control-label mb-1">Work Status</label>
                                <input id="w_status" name="w_status" type="text" class="form-control" placeholder="Email Address here!">
                            </div>
                        </div><br />

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
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