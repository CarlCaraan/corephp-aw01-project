<?php

//upload.php

if (!empty($_FILES)) {
	if (is_uploaded_file($_FILES['uploadFile']['tmp_name'])) {
		$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
		$allow_ext = array('jpg', 'png');
		if (in_array($ext, $allow_ext)) {
			$_source_path = $_FILES['uploadFile']['tmp_name'];
			$target_path = '../../resources/img/uploads/' . $_FILES['uploadFile']['name'];
			$image_path = '../resources/img/uploads/' . $_FILES['uploadFile']['name'];
			if (move_uploaded_file($_source_path, $target_path)) {
				echo '<p class="mt-5"><img src="' . $image_path . '" class="img-thumbnail" width="200" height="160" /></p><br />';
			}
			//echo $ext;
		}
	}
}
