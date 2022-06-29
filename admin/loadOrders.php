<?php
include '../db.php';

$i = 0;

$sql = "SELECT * from orders ";

$run_query = mysqli_query($db, $sql);
if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {

        $i++;
  
        echo '<tr id="trck' . $row1['id'] . '">
        <td>' . $row1['first_name'] . '</td>
        <td>' . $row1['phone_number'] . '</td>
        <td>' . $row1['address']  . '</td>
        <td>' . $row1['city'] . '</td>
        <td>' . $row1['total'] . '</td>
        <td><div class="badge bg-primary text-white rounded-pill">' . $row1['status'] . '</div></td>
        <td>
        <a onclick="editOrder(' . $row1['id'] . ')"  href="#" class="btn btn-datatable btn-icon btn-transparent-dark" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
       </td>
        </tr>';
    }
}

?>



   
