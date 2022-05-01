<?php

//fetch_user.php

require('../config/connect.php');

// Fetch User Type
$get_user_details = mysqli_query($con, "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'");
$current_user_details = mysqli_fetch_array($get_user_details);

// Staff can chat only the Branch Manager
if ($current_user_details['usertype'] == "Staff") {
	$query = "
		SELECT * FROM users INNER JOIN personal ON users.id = personal.user_id 
		WHERE id != '" . $_SESSION['id'] . "' AND status='Verified' AND usertype='Branch Manager'
	";
} else {
	$query = "
		SELECT * FROM users INNER JOIN personal ON users.id = personal.user_id 
		WHERE id != '" . $_SESSION['id'] . "' AND status='Verified'
	";
}


$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '

';

foreach ($result as $row) {
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['id'], $connect);
	if ($user_last_activity > $current_timestamp) {
		$status = '<span class="btn btn-success btn-sm rounded">Online</span>';
	} else {
		$status = '<span class="btn btn-secondary btn-sm rounded">Offline</span>';
	}

	if ($row['image'] == NULL) {
		$image = '../resources/img/uploads/default.jpg';
	} else {
		$image = '../resources/img/uploads/' . $row['image'];
	}
	$count_message = count_unseen_message($row['id'], $_SESSION['id'], $connect);
	if ($count_message == NULL) {
		$count_message = '';
	} else {
		$count_message = ' <span class="badge badge-danger">' . $count_message . '</span>';
	}

	$output .= '
		<a class=" start_chat list-group-item list-group-item-action text-white rounded-0" data-touserid="' . $row['id'] . '" data-tousername="' . $row['first_name'] . "" . $row['last_name'] . '">
		<div class="media"><img src="' . $image . '" alt="user" width="50" class="rounded-circle">
			<div class="media-body ml-4">
			<div class="d-flex align-items-center justify-content-between mb-1">
				<h6 class="mb-0 text-dark">
				' . $row['first_name'] . ' ' . $row['last_name'] . "<small class='text-secondary'> (" . $row['usertype'] . ")</small>" . $count_message
		. ' ' . fetch_is_type_status($row['id'], $connect) . '
				</h6>
				' . $status . '
			</div>
			
			</div>
		</div>
		</a>
	';
}

echo $output;
// <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['id'] . '" data-tousername="' . $row['first_name'] . "" . $row['last_name'] . '">Start Chat</button></td>