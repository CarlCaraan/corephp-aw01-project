<?php
require("../app/config/connect.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chat | App</title>
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
  $toggle_active = "chat";
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
            <h1>Dashboard</h1>
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
            <div class="row">
              <div class="col-sm-4">
                <h4 class="card-title mb-0">Message Me!!!</h4>
              </div>
              <!--/.col-->

              <!--/.col-->


            </div>
            <!--/.row-->
            <!-- chat -->
            <div class="chart-wrapper mt-4">
              <div class="container py-2 px-4">
                <!-- For demo purpose-->

                <div class="row rounded-lg overflow-hidden shadow">
                  <!-- Users box-->
                  <div class="col-5 px-0">
                    <div class="bg-white">

                      <div class="bg-gray px-4 py-2 bg-light">
                        <p class="h5 mb-0 py-1">Recent</p>
                      </div>

                      <div class="messages-box">
                        <div class="list-group rounded-0">
                          <a class="list-group-item list-group-item-action active text-white rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                </div>
                                <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur. incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">9 Nov</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">18 Oct</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">17 Oct</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">2 Sep</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">30 Aug</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                          <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                  <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">21 Aug</small>
                                </div>
                                <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Chat Box-->
                  <div class="col-7 px-0">
                    <div class="px-4 py-5 chat-box bg-white">
                      <!-- Sender Message-->
                      <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                          <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Reciever Message-->
                      <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                          <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Sender Message-->
                      <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                          <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Reciever Message-->
                      <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                          <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Sender Message-->
                      <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                          <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Reciever Message-->
                      <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                          <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                    </div>

                    <!-- Typing area -->
                    <form action="#" class="bg-light">
                      <div class="input-group">
                        <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                        <div class="input-group-append">
                          <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                        </div>
                      </div>
                    </form>
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