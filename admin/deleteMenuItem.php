<?php
	include '../db.php';
	if (isset($_POST['Del_id'])) {
	$query = "DELETE FROM `menu_items`  WHERE `id` = ".$_POST['Del_id']."";
		if ($db->query($query)) {
      echo "Successfully Deleted";		}
	}
	?>