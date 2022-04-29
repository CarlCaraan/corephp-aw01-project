<?php
ob_start(); //Turns on output buffering
session_start();

date_default_timezone_set('Asia/Manila');

$con = mysqli_connect("localhost", "root", "", "loaning"); //Connection variable
$connect = new PDO("mysql:host=localhost;dbname=loaning;charset=utf8mb4", "root", "");

if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}

function fetch_user_last_activity($user_id, $connect)
{
	$query = "
	SELECT * FROM login_details 
	WHERE user_id = '$user_id' 
	ORDER BY last_activity DESC 
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach ($result as $row) {
		return $row['last_activity'];
	}
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat
	WHERE (from_user_id = '" . $from_user_id . "' 
	AND to_user_id = '" . $to_user_id . "') 
	OR (from_user_id = '" . $to_user_id . "' 
	AND to_user_id = '" . $from_user_id . "') 
	ORDER BY timestamp DESC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<div class="list-unstyled">';
	foreach ($result as $row) {
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if ($row["from_user_id"] == $from_user_id) {
			if ($row["status"] == '2') {
				$chat_message = '<em>This message has been removed</em>';
				$user_name = '<b class="text-white">You</b>';
			} else {
				$chat_message = $row['chat_message'];
				$user_name = '<button type="button" class="btn btn-secondary btn-sm rounded remove_chat float-right" id="' . $row['chat_message_id'] . '">x</button>
				<b class="text-white">You</b>';
			}


			$dynamic_background = 'background-color:#007BFF;';
			$timestamp_color = 'color: white;';
		} else {
			if ($row["status"] == '2') {
				$chat_message = '<em>This message has been removed</em>';
			} else {
				$chat_message = $row["chat_message"];
			}
			$user_name = '<b class="text-dark">' . get_user_name($row['from_user_id'], $connect) . '</b>';
			$dynamic_background = 'background-color:#F8F9FA;';
			$timestamp_color = 'color: black;';
		}
		$output .= '
		<li style="border-bottom:1px dotted #ccc;padding-top:15px; padding-left:20px; padding-right:8px; border-radius: 10px; margin-bottom: 1rem;
			box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
			-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
		' . $dynamic_background . '">
			<p class="text-dark">' . $user_name . ' - ' . $chat_message . '
				<div align="right">
					- <small style="' . $timestamp_color . '">' . $row['timestamp'] . '</small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</div>';
	$query = "
	UPDATE chat
	SET status = '0' 
	WHERE from_user_id = '" . $to_user_id . "' 
	AND to_user_id = '" . $from_user_id . "' 
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $output;
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT first_name, last_name FROM users WHERE id = '$user_id'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach ($result as $row) {
		return $row['first_name'] . " " . $row['last_name'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat
	WHERE from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id' 
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$output = '';
	if ($count > 0) {
		$output = '<span class="label label-success">' . $count . '</span>';
	}
	return $output;
}

function fetch_is_type_status($user_id, $connect)
{
	$query = "
	SELECT is_type FROM login_details 
	WHERE user_id = '" . $user_id . "' 
	ORDER BY last_activity DESC 
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach ($result as $row) {
		if ($row["is_type"] == 'yes') {
			$output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
		}
	}
	return $output;
}

function fetch_group_chat_history($connect)
{
	$query = "
	SELECT * FROM chat
	WHERE to_user_id = '0'  
	ORDER BY timestamp DESC
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$output = '<ul class="list-unstyled">';
	foreach ($result as $row) {
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if ($row["from_user_id"] == $_SESSION["id"]) {
			if ($row["status"] == '2') {
				$chat_message = '<em>This message has been removed</em>';
				$user_name = '<b class="text-dark">You</b>';
			} else {
				$chat_message = $row["chat_message"];
				$user_name = '<button type="button" class="btn btn-secondary btn-sm rounded remove_chat float-right" id="' . $row['chat_message_id'] . '">x</button>&nbsp;<b class="text-dark">You</b>';
			}

			$dynamic_background = 'background-color:#007BFF;';
			$timestamp_color = 'color: white;';
		} else {
			if ($row["status"] == '2') {
				$chat_message = '<em>This message has been removed</em>';
			} else {
				$chat_message = $row["chat_message"];
			}
			$user_name = '<b class="text-danger">' . get_user_name($row['from_user_id'], $connect) . '</b>';
			$dynamic_background = 'background-color:#F8F9FA;';
			$timestamp_color = 'color: black;';
		}

		$output .= '

		<li style="border-bottom:1px dotted #ccc;padding-top:15px; padding-left:20px; padding-right:8px; border-radius: 10px; margin-bottom: 1rem;
			box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
			-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
		' . $dynamic_background . '">
			<p class="text-dark">' . $user_name . ' - ' . $chat_message . ' 
				<div align="right">
					- <small style="' . $timestamp_color . '">' . $row['timestamp'] . '</small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	return $output;
}
