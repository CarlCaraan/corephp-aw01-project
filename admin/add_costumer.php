<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEB AND DATABASE</title>
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
    $toggle_active = "customer";
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
                        <h1>Costumer/Add Costumer</h1>
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
                                <button type="submit" class="btn btn-primary btn-sm" style="">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Clear
                                </button>
                            </div>
                        </form>


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



</body>

</html>