<?php
include 'head.php';
include 'header.php';
include 'db.php';
if(!isset($_SESSION['loggedinuserrole'])) {
    header('Location: index.php');
    die();
}
?>

<div id="layoutSidenav" style="display: block;">
    <div id="">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4 " style="margin-top: 50px;">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    Catering Establishment                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mt-4">
                                <!-- show all posts -->
                                <div class="card mb-4">
                                </div>
                            </div>
                        </div>
                    </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="row">
                    <div class="col-xxl-4 col-xl-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body h-100 p-5">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-xxl-12">
                                        <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                            <h1 class="text-primary">Welcome to  Restaurent</h1>
                                            <p class="text-gray-700 mb-0">The way a team plays as a whole determines its
                                                success. You may have the greatest bunch of individual stars in the
                                                world, but if they don't play together, the club won't be worth a dime!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                            src="public/assets/img/illustrations/at-work.svg"
                                            style="max-width: 26rem" /></div>
                                    <div class="card-body custom-card bg-light pt-0 pb-0 mt-5">
                                        <div class="row ">
                                            <?php 
                                            if(isset($_GET['id'])){
                                                $category_id = $_GET['id'];
                        
                                                $category = "SELECT * FROM categories WHERE id = $category_id";
                                                $category_result = mysqli_query($db, $category);
                                                
                                                if(mysqli_num_rows($category_result) > 0){
                                                 
                                                    $category_row = mysqli_fetch_assoc($category_result);
                                                    $category_name = $category_row['category_name'];
                                                    $query = "SELECT * FROM menu_items WHERE category_id = $category_id";
                                                }
                                        
                                            }else{ 
                                                $query = "SELECT * FROM menu_items";
                                                  } ?>
                                            <div class="col-12">
                                                <h2 class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                                    <?php echo $category_name; ?>
                                                </h2>
                                            </div>
                                           <?php
                                            $result = mysqli_query($db, $query);
                                            if(mysqli_num_rows($result)>0){
                                            while($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                            <div class="col-sm-12 mt-2 col-md-3">
                                            <div class="js-post" >
                                                <?php if(isset($_SESSION['loggedinuserid'])){ ?>
                                                    <div style="display: flex;">
                                               
                                                <div class="btn btn-primary" title="Add to favourit" style="width: 90%;" onclick="addToCart(<?php echo $row['id']?>)">
                                                    
                                                    Add to cart
                                                </div> 
                                                    </div> 
                                                <?php } ?>
                                                    <img class="card-img" src="public/product_images/<?php echo $row['image']?>" alt="post image" style="max-height: 300px">
                                                </div>
                                                    <div class="right-auto bg-dark rounded ml-0 mt-3 text-white">
                                                    <!-- <p
                                                        class="bg-danger p-1 w-100 text-center rounded-top mb-0 text-white-tint border border-bottom-0 light-border">
                                                        </p> -->
                                                    <div
                                                        class="p-1 text-center text-white-tint border border-top-0  rounded-bottom light-border">
                                                       Price <?php echo $row['price']?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-9 pl-3 pr-0 pt-2">
                                                <div class="image-wrapper pt-1">

                                                    
                                                    <h4 class="text-white-tint text-lg-left">
                                                        <?php echo $row['name']?></h4>
                                                    <p class="text-secondary mb-1">
                                                        <?php echo $row['description']?></p>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 p-3 mt-3 pt-0 border-top border-secondary event-action-buttons-container">

                                            </div>
                                            <?php }
                                            }else{ ?>
                                            <div class="col-12">
                                                <h2 class="text-center text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                                    No Items Found In This Menu
                                                </h2>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include 'footer.php';
        ?>
    </div>
</div>

<script>

function addToCart(id) {

$.ajax({
    url: 'addToCart.php',
    type: 'POST',
    data: {
        id: id
    },
    success: function(response) {
if(response=="You are not logged in please login to continue"){
alert(response);
window.location.href="login.php";
}else{
alert(response);


}

    }
});
}
</script>