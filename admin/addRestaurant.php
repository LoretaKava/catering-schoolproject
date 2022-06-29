<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';

if($_SESSION['loggedinuserrole']=="User") {
  header('Location: ../index.php');
  die();
}

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $code = $_POST['code'];
  $end_time = $_POST['end_time'];
  $owner_name = $_POST['owner_name'];
  $phone = $_POST['phone'];
  $owner_address = $_POST['owner_address'];
  $query = "INSERT INTO `restaurant_info` (`name`, `address`, `code`) 
  VALUES ('$name', '$address', '$code')"; 
  if (mysqli_query($db, $query)) {
    header("Location: cateringEstablishmentDetail.php");
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert Item.</p>";
  }
} ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->
                <div style="justify-content: center;margin-top: 20px" class="row">
                    <div class="col-xl-10">
                        <div class="card mb-4">
                            <div class="card-header">Add Catering Establishment Details</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="Catering Establishment Name"> Catering Establishment Name</label>
                                            <input class="form-control" required name="name" type="text"
                                                placeholder="Catering Establishment Name" />
                                        </div>
                                        <!-- date -->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="date">Address</label>
                                            <input class="form-control" required name="address" type="text"
                                                placeholder="Address" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="start_time">Code</label>
                                            <input class="form-control" required name="code" type="text"
                                                placeholder="Enter code" />
                                        </div>
                                   
                                    </div>
                                    <hr>
                             
                                    <div class="row gx-3 mb-3">
                                    
                                        <!-- owner_address -->
                                        <input type="submit" class="btn btn-primary mt-5" name="save" type="button"
                                            value="save">
                                    </div>
                                    <!-- Save changes button-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
    include '../admin/footer.php';
    ?>
    </div>
</div>
<style>
.form-check.form-check-solid {
    float: left;
    margin-right: 15px;
}
</style>