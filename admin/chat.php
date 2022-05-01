<?php
require("../app/config/connect.php");
include("../classes/User.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chat | App</title>
  <meta name="description" content="WEB AND DATABASE">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../resources/img/login.png">
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

  <!-- START CHAT CSS AND SCRIPTS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <!-- End CHAT CSS AND SCRIPTS -->
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
            <h1>Chat</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Chat Content  -->
    <div class="content mt-3">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h3>Message Me!!!</h3><br />
            <br />

            <!-- chat -->
            <div class="chart-wrapper">
              <div class="container py-2 px-4">
                <!-- For demo purpose-->

                <div class="row rounded-lg overflow-hidden shadow">
                  <!-- Users box-->
                  <div class="col-5 px-0">
                    <div class="bg-white">

                      <div class="bg-gray px-4 py-2 bg-light">
                        <input type="hidden" id="is_active_group_chat_window" value="no" />
                        <button type="button" name="group_chat" id="group_chat" class="btn btn-info btn-sm float-right"><i class="ti-crown"></i> Group Chat</button>
                        <p class="h5 mb-0 py-1">Recent</p>
                      </div>

                      <div class="messages-box">
                        <div class="list-group rounded-0">
                          <div class="col" id="user_details"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Chat Box-->
                  <div class="col-7 px-0">
                    <div class="px-4 py-5 bg-white">
                      <div class="col" id="user_model_details">
                        <h4 class="text-center text-secondary mt-5"><i class="ti-info-alt"></i> Select a user to start a conversation.</h4>
                      </div>



                    </div>
                  </div>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>


    </div>
    <!-- End Chat Content  -->

    <!-- Start GroupChat Content -->
    <div id="group_chat_dialog" title="Group Chat Window (Admin Only)">
      <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

      </div>
      <div class="form-group">
        <div class="chat_message_area">
          <div id="group_chat_message" contenteditable class="form-control">

          </div>
          <div class="image_upload">
            <form id="uploadImage" method="post" action="../app/ajax_chat/upload.php">
              <label class="float-right" for="uploadFile"><i class="ti-cloud-up"></i></label>
              <input style="opacity: 0;" type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
            </form>
          </div>
        </div>
      </div>
      <div class="form-group" align="right">
        <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info btn-sm rounded"><i class="ti-location-arrow"></i> Send</button>
      </div>
    </div>
    <!-- End GroupChat Content -->

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

  <script>
    $(document).ready(function() {

      fetch_user();

      setInterval(function() {
        update_last_activity();
        fetch_user();
        update_chat_history_data();
        fetch_group_chat_history();
      }, 5000);

      function fetch_user() {
        $.ajax({
          url: "../app/ajax_chat/fetch_user.php",
          method: "POST",
          success: function(data) {
            $('#user_details').html(data);
          }
        })
      }

      function update_last_activity() {
        $.ajax({
          url: "../app/ajax_chat/update_last_activity.php",
          success: function() {

          }
        })
      }

      function make_chat_dialog_box(to_user_id, to_user_name) {
        var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
        modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
        modal_content += fetch_user_chat_history(to_user_id);
        modal_content += '</div>';
        modal_content += '<div class="form-group">';
        modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message"></textarea>';
        modal_content += '</div><div class="form-group" align="right">';
        modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat rounded"><i class="ti-location-arrow"></i> Send</button></div></div>';
        $('#user_model_details').html(modal_content);
      }

      $(document).on('click', '.start_chat', function() {
        var to_user_id = $(this).data('touserid');
        var to_user_name = $(this).data('tousername');
        make_chat_dialog_box(to_user_id, to_user_name);
        // $("#user_dialog_" + to_user_id).dialog({
        //   autoOpen: false,
        //   width: 400
        // });
        $('#user_dialog_' + to_user_id).dialog('open');
        $('#chat_message_' + to_user_id).emojioneArea({
          pickerPosition: "top",
          toneStyle: "bullet"
        });
      });

      $(document).on('click', '.send_chat', function() {
        var to_user_id = $(this).attr('id');
        var chat_message = $.trim($('#chat_message_' + to_user_id).val());
        if (chat_message != '') {
          $.ajax({
            url: "../app/ajax_chat/insert_chat.php",
            method: "POST",
            data: {
              to_user_id: to_user_id,
              chat_message: chat_message
            },
            success: function(data) {
              //$('#chat_message_'+to_user_id).val('');
              var element = $('#chat_message_' + to_user_id).emojioneArea();
              element[0].emojioneArea.setText('');
              $('#chat_history_' + to_user_id).html(data);
            }
          })
        } else {
          alert('Type something');
        }
      });

      function fetch_user_chat_history(to_user_id) {
        $.ajax({
          url: "../app/ajax_chat/fetch_user_chat_history.php",
          method: "POST",
          data: {
            to_user_id: to_user_id
          },
          success: function(data) {
            $('#chat_history_' + to_user_id).html(data);
          }
        })
      }

      function update_chat_history_data() {
        $('.chat_history').each(function() {
          var to_user_id = $(this).data('touserid');
          fetch_user_chat_history(to_user_id);
        });
      }

      $(document).on('click', '.ui-button-icon', function() {
        $('.user_dialog').dialog('destroy').remove();
        $('#is_active_group_chat_window').val('no');
      });

      $(document).on('focus', '.chat_message', function() {
        var is_type = 'yes';
        $.ajax({
          url: "../app/ajax_chat/update_is_type_status.php",
          method: "POST",
          data: {
            is_type: is_type
          },
          success: function() {

          }
        })
      });

      $(document).on('blur', '.chat_message', function() {
        var is_type = 'no';
        $.ajax({
          url: "../app/ajax_chat/update_is_type_status.php",
          method: "POST",
          data: {
            is_type: is_type
          },
          success: function() {

          }
        })
      });

      // === Group Chat ===
      $('#group_chat_dialog').dialog({
        autoOpen: false,
        width: 400
      });

      $('#group_chat').click(function() {
        $('#group_chat_dialog').dialog('open');
        $('#is_active_group_chat_window').val('yes');
        fetch_group_chat_history();
      });

      $('#send_group_chat').click(function() {
        var chat_message = $.trim($('#group_chat_message').html());
        var action = 'insert_data';
        if (chat_message != '') {
          $.ajax({
            url: "../app/ajax_chat/group_chat.php",
            method: "POST",
            data: {
              chat_message: chat_message,
              action: action
            },
            success: function(data) {
              $('#group_chat_message').html('');
              $('#group_chat_history').html(data);
            }
          })
        } else {
          alert('Type something');
        }
      });

      function fetch_group_chat_history() {
        var group_chat_dialog_active = $('#is_active_group_chat_window').val();
        var action = "fetch_data";
        if (group_chat_dialog_active == 'yes') {
          $.ajax({
            url: "../app/ajax_chat/group_chat.php",
            method: "POST",
            data: {
              action: action
            },
            success: function(data) {
              $('#group_chat_history').html(data);
            }
          })
        }
      }

      $('#uploadFile').on('change', function() {
        $('#uploadImage').ajaxSubmit({
          target: "#group_chat_message",
          resetForm: true
        });
      });

      $(document).on('click', '.remove_chat', function() {
        var chat_message_id = $(this).attr('id');
        if (confirm("Are you sure you want to remove this chat?")) {
          $.ajax({
            url: "../app/ajax_chat/remove_chat.php",
            method: "POST",
            data: {
              chat_message_id: chat_message_id
            },
            success: function(data) {
              update_chat_history_data();
            }
          })
        }
      });

    });
  </script>

</body>

</html>