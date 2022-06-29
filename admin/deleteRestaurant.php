<?php
	include '../db.php';
	if (isset($_POST['Del_id'])) {
	$query = "DELETE FROM `restaurant_info`  WHERE `id` = ".$_POST['Del_id']."";
		if ($db->query($query)) {
      echo "Successfully Deleted";		}
	}
	?>