<?php
include '../db.php';



if(isset ($_POST['inputFullName']) ){

    $query = "UPDATE `users` SET `full_name` = '".$_POST['inputFullName']."',`join_request` = '".$_POST['join_request']."',`email` = '".$_POST['inputEmailAddress']."',`password` = '".$_POST['inputPassword']."',`phone` = ".$_POST['inputPhoneNumber'].",role='".$_POST['inputRole']."',status='".$_POST['inputActiveStatus']."',payment_method='".$_POST['payment_method']."' WHERE `id` = ".$_POST['inputId']."";
       if (mysqli_query($db, $query)) {
      
        echo "Record updated successfully";
    }
  
} else {

    echo "Error updating record: " . mysqli_error($db);
}



?>