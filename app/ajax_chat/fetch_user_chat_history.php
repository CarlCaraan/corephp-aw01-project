<?php

//fetch_user_chat_history.php

include('../config/connect.php');

echo fetch_user_chat_history($_SESSION['id'], $_POST['to_user_id'], $connect);
