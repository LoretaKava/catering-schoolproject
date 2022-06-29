<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
// add category module with name and description
if($_SESSION['loggedinuserrole']=="User") {
  header('Location: ../index.php');
  die();
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $food_establishment = $_POST['food_establishment'];
    $sql = "INSERT INTO categories (name, description,food_establishment_id) VALUES ('$name', '$description',$food_establishment)";
    if (mysqli_query($db, $sql)) {
        header("Location: allCategories.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert Item.</p>";
    }
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->
                <div style="justify-content: center;margin-top: 20px" class="row">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="text-primary font-weight-normal mb-0">Add Menu</h6>
                            </div>
                            <div class="card-body">
                                <form action="addCategory.php" method="post">
                                    <div class="form-group">
                                        <label class="form-label">Menu Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Menu Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Select Food Establishment</label>
                                        <select class="form-control" name="food_establishment">
                                            <option value="">Select Food Establishment</option>
                                            <?php
                                            $sql = "SELECT * FROM restaurant_info";
                                            $result = mysqli_query($db, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="Description"></textarea>
                                    </div>
                                    <!-- full widhth button -->
                                    <div class="text-center col-sm-12 mt-5">
                                    <input type="submit" class="btn btn-primary col-sm-12" name="save" type="button" value="save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include '../admin/footer.php'; ?>
</body>
</html>


