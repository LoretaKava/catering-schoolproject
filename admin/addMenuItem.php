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
// file upload

      $file_name = $_FILES['fileToUpload']['name'];
      $file_size =$_FILES['fileToUpload']['size'];
      $file_tmp =$_FILES['fileToUpload']['tmp_name'];
      $file_type=$_FILES['fileToUpload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../public/product_images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }

  $name = mysqli_real_escape_string($db, $_POST['inputName']);
  $inputDescription = mysqli_real_escape_string($db, $_POST['inputDescription']);
  $inputPrice = mysqli_real_escape_string($db, $_POST['inputPrice']);
  $inputCategory = mysqli_real_escape_string($db, $_POST['inputCategory']);
  $sql = "INSERT INTO menu_items (name,description,price,image,category_id)
              VALUES ('{$name}','{$inputDescription}','{$inputPrice}','{$file_name}','{$inputCategory}')";
            
  if (mysqli_query($db, $sql)) {
    header("Location: allMenuItems.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
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
              <div class="card-header">Add Item</div>
              <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputName">Item Name</label>
                      <input class="form-control" required name="inputName" type="text" placeholder="Enter name" />
                    </div>
                         <!-- Form Group (location)-->
                         <div class="col-md-6">
                          <label class="small mb-1" for="inputPrice">Price</label>
                          <input class="form-control" required name="inputPrice" type="number" placeholder="Enter Price" />
                        </div>
                      </div>
                  <!-- Form Row        -->
                  <div class="row gx-3 mb-3">
                    <div class="col-md-12">
                      <label class="small mb-1" for="inputPhone">Description</label>
                      <textarea class="form-control" required name="inputDescription" type="tel" placeholder="Enter description" ></textarea>
                    </div>
                  <!-- Form Row-->
                  <div class="row gx-3 mb-3">
                    <!-- category -->
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputCategory">Category</label>
                      <select class="form-control" required name="inputCategory">
                        <option value="">Choose Category</option>
                     <?php
                      $sql = "SELECT * FROM categories";
                      $result = mysqli_query($db, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                      }
                      ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="Image">Image</label>
                      <input class="form-control" required name="fileToUpload" type="file"  />
                    </div>
                  </div>
                  <!-- Save changes button-->
                  <input type="submit" class="btn btn-primary" name="save" type="button" value="save">
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