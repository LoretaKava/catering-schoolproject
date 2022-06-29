<?php


include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}

if (isset($_POST['update'])) {
 
 
        $updateQuery = "UPDATE restaurant_info SET `name` = '" . $_POST['inputName'] . "', `address` = '" . $_POST['inputAddress'] . "', `code` = '" . $_POST['inputCode'] . "' WHERE `id` = '" . $_GET['id'] . "'";
        if (mysqli_query($db, $updateQuery)) {

            header("Location: cateringEstablishmentDetail.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        
}

?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-xl px-12 mt-12">
                <div style="justify-content: center;margin-top: 20px" class="row">
                    <div class="col-xl-10">
                        <div class="card mb-4">
                            <div class="card-header">Edit Catering Establisjment Details</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    <?php

                                        $sql = "SELECT * from restaurant_info  where id='" . $_GET['id'] . "' ";
                                        $query = mysqli_query($db, $sql);

                                        if (mysqli_num_rows($query) > 0) {
                                            while ($row1 = mysqli_fetch_assoc($query)) {
                                     ?>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <input required type="hidden" name="id" id="id" value="<?=$_GET['id']?>">
                                            <label class="small mb-1" for="inputParkName">Establishment name</label>
                                            <input required class="form-control" name="inputName" type="text"
                                                placeholder="Enter establishment name"
                                                value="<?php echo $row1['name']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputAddress">Establishment Address</label>
                                            <input required class="form-control" name="inputAddress" type="text"
                                                placeholder="Enter Establishment Address" value="<?php echo $row1['address']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputAddress">Establishment Code</label>
                                            <input required class="form-control" name="inputCode" type="text"
                                                placeholder="Enter Establishment Code" value="<?php echo $row1['code']; ?>">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                            </div>
                            
                            <input class="btn btn-primary" name="update" type="submit" value="Save changes">
                            <?php
}
}
?>
                            </form>
                        </div>
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