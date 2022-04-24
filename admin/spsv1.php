<?php
require("../app/config/connect.php");
include("../classes/User.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Spsv1 | App</title>
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
    <?php
    $toggle = "show";
    $toggle_active = "spsv1";
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
                        <h1>Costumer/SPSV1</h1>
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


                        <!--   </div> -->
                        <!-- form -->
                        <div class="content mt-3">
                            <div class="animated fadeIn">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Data Table</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Name</center>
                                                            </th>
                                                            <th>
                                                                <center>Address</center>
                                                            </th>
                                                            <th>
                                                                <center>Contact</center>
                                                            </th>
                                                            <th>
                                                                <center>Account</center>
                                                            </th>
                                                            <th>
                                                                <center>Amount</center>
                                                            </th>
                                                            <th>
                                                                <center>Payment</center>
                                                            </th>
                                                            <th>
                                                                <center>Balance</center>
                                                            </th>
                                                            <th>
                                                                <center>Action</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                            <td>Edinburgh</td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                            <td>Edinburgh</td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view"><i class="fa fa-eye"></i> </button>
                                                                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update"><i class="fa fa-refresh"></i>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div><!-- .animated -->
                        </div><!-- .content -->

                        <!-- end of form -->

                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
        <!-- end chat -->
    </div>

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

    <!-- modal view -->
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                                <h2 class="text-light display-6">Jim Doe</h2>
                                                <p>Project Manager <br />09304895235<br />Birthday</p>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            </aside>
                        </div>
                        <div class="col-sm-6">
                            <input id="p_address" name="p_address" type="text" class="form-control" value="ATM"><br />
                            <input id="p_address" name="p_address" type="text" class="form-control" value="Permanent Address"><br />
                            <input id="p_address" name="p_address" type="text" class="form-control" value="Mailing Address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label></label>
                            <input id="t_number" name="t_number" type="text" class="form-control" placeholder="Telephone/Mobile Number here!">
                        </div>
                        <div class="col-sm-6">
                            <label></label>
                            <input id="id_card" name="id_card" type="text" class="form-control" placeholder="ID Card Number here!">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label></label>
                            <input id="mother" name="mother" type="text" class="form-control" placeholder="Mother's Name here!">
                            <label></label>
                            <input id="father" name="father" type="text" class="form-control" placeholder="Father's Name here!">
                            <label></label>
                            <input id="spouse" name="spouse" type="text" class="form-control" placeholder="Name of Spouse here!">
                        </div>
                        <div class="col-sm-6">
                            <label></label>
                            <input id="c_person" name="c_person" type="text" class="form-control" placeholder="Contact Person here!">
                            <label></label>
                            <input id="contact" name="contact" type="text" class="form-control" placeholder="Contact Number here!">
                            <label></label>
                            <input id="s_number" name="s_number" type="text" class="form-control" placeholder="Spouse Contact Number here!">
                        </div>
                    </div><br />

                    <div class="card-header">
                        <strong class="card-title">Company Information</strong>
                    </div><br />
                    <div class="row">
                        <div class="col-sm-4">
                            <label></label>
                            <input id="c_affiliated" name="c_affiliated" type="text" class="form-control" placeholder="Lastname here!">
                        </div>
                        <div class="col-sm-4">
                            <label></label>
                            <input id="c_address" name="c_address" type="text" class="form-control" placeholder="Firstname here!">
                        </div>
                        <div class="col-sm-4">
                            <label></label>
                            <input id="c_number" name="c_number" type="text" class="form-control" placeholder="Middlename here!">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label></label>
                            <input id="position" name="position" type="text" class="form-control" placeholder="Permanent Address here!">
                        </div>
                        <div class="col-sm-6">
                            <label></label>
                            <input id="w_status" name="w_status" type="text" class="form-control" placeholder="Email Address here!">
                        </div>
                    </div><br />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal view -->

    <!-- modal update -->
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                                <h2 class="text-light display-6">Jim Doe</h2>
                                                <p>Project Manager <br />09304895235<br />Birthday</p>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            </aside>
                        </div>
                        <div class="col-sm-6">
                            <input id="p_address" name="p_address" type="text" class="form-control" value="ATM"><br />
                            <input id="p_address" name="p_address" type="text" class="form-control" value="Permanent Address"><br />
                            <input id="p_address" name="p_address" type="text" class="form-control" value="Mailing Address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label></label>
                            <input id="t_number" name="t_number" type="text" class="form-control" placeholder="Telephone/Mobile Number here!">
                        </div>
                        <div class="col-sm-6">
                            <label></label>
                            <input id="id_card" name="id_card" type="text" class="form-control" placeholder="ID Card Number here!">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label></label>
                            <input id="mother" name="mother" type="text" class="form-control" placeholder="Mother's Name here!">
                            <label></label>
                            <input id="father" name="father" type="text" class="form-control" placeholder="Father's Name here!">
                            <label></label>
                            <input id="spouse" name="spouse" type="text" class="form-control" placeholder="Name of Spouse here!">
                        </div>
                        <div class="col-sm-6">
                            <label></label>
                            <input id="c_person" name="c_person" type="text" class="form-control" placeholder="Contact Person here!">
                            <label></label>
                            <input id="contact" name="contact" type="text" class="form-control" placeholder="Contact Number here!">
                            <label></label>
                            <input id="s_number" name="s_number" type="text" class="form-control" placeholder="Spouse Contact Number here!">
                        </div>
                    </div><br />

                    <div class="card-header">
                        <strong class="card-title">Company Information</strong>
                    </div><br />
                    <div class="row">
                        <div class="col-sm-4">
                            <label></label>
                            <input id="c_affiliated" name="c_affiliated" type="text" class="form-control" placeholder="Lastname here!">
                        </div>
                        <div class="col-sm-4">
                            <label></label>
                            <input id="c_address" name="c_address" type="text" class="form-control" placeholder="Firstname here!">
                        </div>
                        <div class="col-sm-4">
                            <label></label>
                            <input id="c_number" name="c_number" type="text" class="form-control" placeholder="Middlename here!">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label></label>
                            <input id="position" name="position" type="text" class="form-control" placeholder="Permanent Address here!">
                        </div>
                        <div class="col-sm-6">
                            <label></label>
                            <input id="w_status" name="w_status" type="text" class="form-control" placeholder="Email Address here!">
                        </div>
                    </div><br />

                    <div class="card-header">
                        <strong class="card-title">Loans</strong>
                    </div><br />
                    <div class="row">
                        <div class="col-sm-4">
                            <label></label>
                            <input id="amount" name="amount" type="text" class="form-control" placeholder="Amount here!">
                        </div>
                        <div class="col-sm-4">
                            <label></label>
                            <input id="payment" name="payment" type="text" class="form-control" placeholder="Payment here!">
                        </div>
                        <div class="col-sm-4">
                            <label></label>
                            <input id="balance" name="c_number" type="text" class="form-control" placeholder="Balance here!">
                        </div>
                    </div><br />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal update -->

    <!-- modal deletet -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">YES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal delete -->

</body>

</html>