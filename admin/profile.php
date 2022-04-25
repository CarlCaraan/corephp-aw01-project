<?php
require("../app/config/connect.php");
include("../classes/User.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Profile | App</title>
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
    <style>
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            width: 5px;
            background: #f5f5f5;
        }

        ::-webkit-scrollbar-thumb {
            width: 1em;
            background-color: #ddd;
            outline: 1px solid slategrey;
            border-radius: 1rem;
        }

        .text-small {
            font-size: 0.9rem;
        }

        .messages-box,
        .chat-box {
            height: 510px;
            overflow-y: scroll;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        input::placeholder {
            font-size: 0.9rem;
            color: #999;
        }
    </style>
</head>

<body>


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
                        <h1>My Profile
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> EDIT PROFILE</i>
                            </button>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> CHANGE PASSWORD</i>
                            </button>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <!--  <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
 -->
            <!--/.col-->


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">


                        <!--/.col-->

                        <!-- start -->
                        <!--   </div> -->
                        <!-- form -->
                        <form action="">
                            <div class="card-header">
                                <strong class="card-title">Personal Information</strong>
                            </div><br />
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="first_name" class="control-label mb-1">First Name*</label>
                                    <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First Name" disabled>
                                </div>

                                <div class="col-sm-3">
                                    <label for="last_name" class="control-label mb-1">Last Name*</label>
                                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" disabled>
                                </div>

                                <div class="col-sm-3">
                                    <label for="middle_name" class="control-label mb-1">Middle Name</label>
                                    <input id="middle_name" name="middle_name" type="text" class="form-control" placeholder="Middle Name" disabled>
                                </div>
                                <!--  <div class="col-sm-3">
                                              <label for="mname" class="control-label mb-1">Catteg</label>
                                              <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename here!">
                                        </div> -->

                                <div class="col-sm-3">
                                    <label for="category" class="control-label mb-1">Categories</label>
                                    <select name="category" id="category" class="form-control" disabled>
                                        <option value="0">Please select</option>
                                        <option value="atm">ATM</option>
                                        <option value="sps">SPS</option>
                                        <option value="spsv1">SPSV1</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="address" class="control-label mb-1">Permanent Address</label>
                                    <input id="address" name="address" type="text" class="form-control" placeholder="Permanent Address" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email" class="control-label mb-1">Email Address</label>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email Address" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="dob" class="control-label mb-1">Date of Birth</label>
                                    <input id="dob" name="dob" type="text" class="form-control" placeholder="Birthday" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="mobile" class="control-label mb-1">Telephone/Mobile Number</label>
                                    <input id="mobile" name="mobile" type="text" class="form-control" placeholder="Telephone/Mobile Number " disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="card_number" class="control-label mb-1">ID Card Number</label>
                                    <input id="card_number" name="card_number" type="text" class="form-control" placeholder="ID Card Number" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="mother_name" class="control-label mb-1">Mother's Name</label>
                                    <input id="mother_name" name="mother_name" type="text" class="form-control" placeholder="Mother's Name" disabled>
                                    <label for="father_name" class="control-label mb-1">Father's Name</label>
                                    <input id="father_name" name="father_name" type="text" class="form-control" placeholder="Father's Name" disabled>
                                    <label for="spouse_name" class="control-label mb-1">Name of Spouse</label>
                                    <input id="spouse_name" name="spouse_name" type="text" class="form-control" placeholder="Name of Spouse" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contact_person" class="control-label mb-1">Contact Person</label>
                                    <input id="contact_person" name="contact_person" type="text" class="form-control" placeholder="Contact Person" disabled>
                                    <label for="contact_number" class="control-label mb-1">Contact Number</label>
                                    <input id="contact_number" name="contact_number" type="text" class="form-control" placeholder="Contact Number" disabled>
                                    <label for="s_contact_number" class="control-label mb-1">Spouse Contact Number</label>
                                    <input id="s_contact_number" name="s_contact_number" type="text" class="form-control" placeholder="Spouse Contact Number" disabled>
                                </div>
                            </div><br />

                            <div class="card-header">
                                <strong class="card-title">Company Information</strong>
                            </div><br />
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="company_affiliated" class="control-label mb-1">Company Affiliated With</label>
                                    <input id="company_affiliated" name="company_affiliated" type="text" class="form-control" placeholder="Company Name" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="company_address" class="control-label mb-1">Company Address</label>
                                    <input id="company_address" name="company_address" type="text" class="form-control" placeholder="Company Address" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="company_number" class="control-label mb-1">Company Contact Number</label>
                                    <input id="company_number" name="company_number" type="text" class="form-control" placeholder="Company Contact Number" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="position" class="control-label mb-1">Position/Occupation</label>
                                    <input id="position" name="position" type="text" class="form-control" placeholder="Position Occupation" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label for="work_status" class="control-label mb-1">Work Status</label>
                                    <input id="work_status" name="work_status" type="text" class="form-control" placeholder="Work Status" disabled>
                                </div>
                            </div><br />
                        </form>


                        <!-- end of form -->

                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

        <!-- start modal add -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../app/controllers/edit_profile_handler.php" method="POST">
                            <div class="card-header">
                                <strong class="card-title">Personal Information</strong>
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
                                    <label for="middle_name" class="control-label mb-1">Middle Name</label>
                                    <input id="middle_name" name="middle_name" type="text" class="form-control" placeholder="Middle Name">
                                </div>
                                <!--  <div class="col-sm-3">
                                              <label for="mname" class="control-label mb-1">Catteg</label>
                                              <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename here!">
                                        </div> -->

                                <div class="col-sm-3">
                                    <label for="category" class="control-label mb-1">Categories</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="0">Please select</option>
                                        <option value="atm">ATM</option>
                                        <option value="sps">SPS</option>
                                        <option value="spsv1">SPSV1</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="address" class="control-label mb-1">Permanent Address</label>
                                    <input id="address" name="address" type="text" class="form-control" placeholder="Permanent Address">
                                </div>
                                <div class="col-sm-6">
                                    <label for="email" class="control-label mb-1">Email Address</label>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email Address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="dob" class="control-label mb-1">Date of Birth</label>
                                    <input id="dob" name="dob" type="text" class="form-control" placeholder="Birthday">
                                </div>
                                <div class="col-sm-4">
                                    <label for="mobile" class="control-label mb-1">Telephone/Mobile Number</label>
                                    <input id="mobile" name="mobile" type="text" class="form-control" placeholder="Telephone/Mobile Number ">
                                </div>
                                <div class="col-sm-4">
                                    <label for="card_number" class="control-label mb-1">ID Card Number</label>
                                    <input id="card_number" name="card_number" type="text" class="form-control" placeholder="ID Card Number">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="mother_name" class="control-label mb-1">Mother's Name</label>
                                    <input id="mother_name" name="mother_name" type="text" class="form-control" placeholder="Mother's Name">
                                    <label for="father_name" class="control-label mb-1">Father's Name</label>
                                    <input id="father_name" name="father_name" type="text" class="form-control" placeholder="Father's Name">
                                    <label for="spouse_name" class="control-label mb-1">Name of Spouse</label>
                                    <input id="spouse_name" name="spouse_name" type="text" class="form-control" placeholder="Name of Spouse">
                                </div>
                                <div class="col-sm-6">
                                    <label for="contact_person" class="control-label mb-1">Contact Person</label>
                                    <input id="contact_person" name="contact_person" type="text" class="form-control" placeholder="Contact Person">
                                    <label for="contact_number" class="control-label mb-1">Contact Number</label>
                                    <input id="contact_number" name="contact_number" type="text" class="form-control" placeholder="Contact Number">
                                    <label for="s_contact_number" class="control-label mb-1">Spouse Contact Number</label>
                                    <input id="s_contact_number" name="s_contact_number" type="text" class="form-control" placeholder="Spouse Contact Number">
                                </div>
                            </div><br />

                            <div class="card-header">
                                <strong class="card-title">Company Information</strong>
                            </div><br />
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="company_affiliated" class="control-label mb-1">Company Affiliated With</label>
                                    <input id="company_affiliated" name="company_affiliated" type="text" class="form-control" placeholder="Company Name">
                                </div>
                                <div class="col-sm-4">
                                    <label for="company_address" class="control-label mb-1">Company Address</label>
                                    <input id="company_address" name="company_address" type="text" class="form-control" placeholder="Company Address">
                                </div>
                                <div class="col-sm-4">
                                    <label for="company_number" class="control-label mb-1">Company Contact Number</label>
                                    <input id="company_number" name="company_number" type="text" class="form-control" placeholder="Company Contact Number">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="position" class="control-label mb-1">Position/Occupation</label>
                                    <input id="position" name="position" type="text" class="form-control" placeholder="Position Occupation">
                                </div>
                                <div class="col-sm-6">
                                    <label for="work_status" class="control-label mb-1">Work Status</label>
                                    <input id="work_status" name="work_status" type="text" class="form-control" placeholder="Work Status">
                                </div>
                            </div><br />

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit_profile">
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
    </div>
    <!-- end -->
    </div>
    </div>










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


</body>

</html>