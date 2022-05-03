<?php
//fetch.php;
if (isset($_POST["view"])) {

	require('../config/connect.php');
	if ($_POST["view"] != '') {
		mysqli_query($con, "update `notifications` set seen_status='1' where seen_status='0'");
	}

	$query = mysqli_query($con, "select * from `notifications` order by id desc limit 10");
	$output = '';



	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_array($query)) {
			// Start TimeStamp
			$date_time_now = date("Y-m-d H:i:s");
			$start_date = new DateTime($row['datetime']); //Time of post
			$end_date = new DateTime($date_time_now); //Current Time
			$interval = $start_date->diff($end_date); //Difference between dates
			if ($interval->y >= 1) {
				if ($interval == 1)
					$time_message = $interval->y . " year ago"; //prints "1 year ago"
				else
					$time_message = $interval->y . " years ago"; //prints "1+ year ago"
			} else if ($interval->m >= 1) {
				if ($interval->d == 0) {
					$days = " ago";
				} else if ($interval->d == 1) {
					$days = $interval->d . " day ago";
				} else {
					$days = $interval->d . " days ago";
				}


				if ($interval->m == 1) {
					$time_message = $interval->m . " month" . $days;
				} else {
					$time_message = $interval->m . " months" . $days;
				}
			} else if ($interval->d >= 1) {
				if ($interval->d == 1) {
					$time_message = "Yesterday";
				} else {
					$time_message = $interval->d . " days ago";
				}
			} else if ($interval->h >= 1) {
				if ($interval->h == 1) {
					$time_message = $interval->h . " hour ago";
				} else {
					$time_message = $interval->h . " hours ago";
				}
			} else if ($interval->i >= 1) {
				if ($interval->i == 1) {
					$time_message = $interval->i . " minute ago";
				} else {
					$time_message = $interval->i . " minutes ago";
				}
			} else {
				if ($interval->s < 30) {
					$time_message = "Just now";
				} else {
					$time_message = $interval->s . " seconds ago";
				}
			}
			// End TimeStamp

			$output .= '
                        <span class="dropdown-item media bg-light">
                            <a class="message media-body" href="./account">
                                <span class="name float-left">' . $row['fname'] . ' ' . $row['lname'] . '</span>
                                <span class="time float-right">' . $time_message . '</span>
                                <p>' . $row['notif_message'] . '</p>
							</a>
							<a class="text-danger ml-3 mt-2" href="../app/ajax_notifications/delete_notification_handler.php?id=' . $row['id'] . '"><i class="ti-trash"></i></a>
                        </span>
	
	';
		}
	} else {
		$output .= '<center><small class="text-secondary">No Notifications Found</small></center>';
	}

	$query1 = mysqli_query($con, "select * from `notifications` where seen_status='0'");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
}
