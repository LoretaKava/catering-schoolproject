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
 
 
        $updateQuery = "UPDATE categories SET `name` = '" . $_POST['inputName'] . "', `description` = '" . $_POST['inputDescription'] . "' WHERE `id` = '" . $_GET['id'] . "'";
        if (mysqli_query($db, $updateQuery)) {

            header("Location: allCategories.php");
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
                            <div class="card-header">Edit Category Details</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    <?php

                                        $sql = "SELECT * from categories  where id='" . $_GET['id'] . "' ";
                                        $query = mysqli_query($db, $sql);

                                        if (mysqli_num_rows($query) > 0) {
                                            while ($row1 = mysqli_fetch_assoc($query)) {
                                     ?>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <input required type="hidden" name="id" id="id" value="<?=$_GET['id']?>">
                                            <label class="small mb-1" for="inputParkName">Category name</label>
                                            <input required class="form-control" name="inputName" type="text"
                                                placeholder="Enter Category name"
                                                value="<?php echo $row1['name']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputDescription">Category
                                                description</label>
                                            <textarea required class="form-control" name="inputDescription" type="text"
                                                placeholder="Enter Category description"><?php echo $row1['description']; ?></textarea>
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