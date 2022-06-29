<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
        id="sidenavAccordion">
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="home.php">Catering Establishment </a>
        <!-- Navbar Items-->

        <ul class="navbar-nav align-items-center ms-auto">
            <!-- Documentation Dropdown-->
            <?php
if(isset($_SESSION['loggedinuseremail'])){
?>
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id=""
                    href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img style="width: 60px;" src="public/images/bell.png" alt=""></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage" style="width:400px;max-height: 500px;scroll-behavior: smooth;overflow: scroll;">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Food Establishments</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <?php 
                    include 'db.php';
                    error_reporting(0);
                 
                      
                   
                    $query = "SELECT * FROM restaurant_info";
                    $result = mysqli_query($db, $query);
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                    <a class="dropdown-item" href="cateringEstablishmentMenu.php?id=<?php echo $row['id']?>" style="text-decoration: underline;">
                    
                        <div class="dropdown-item-desc"><?php echo $row['name']?></div>
                    </a>
                    <div class="dropdown-divider"></div>

                    <?php
                        }
                    }else {
                        echo "<p>No Food Establishment Found</p>";
                    }
           
                    ?>
              
                </div>
            </li>
            <?php
}
?>

            <?php
if(isset($_SESSION['loggedinuseremail'])){
?>
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid"
                        src="public/assets/img/illustrations/profiles/profile-1.png" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img"
                            src="public/assets/img/illustrations/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name"><?php if (isset($_SESSION['loggedinuseremail'])) {
                                                            echo $_SESSION['loggedinusername'];
                                                        } ?></div>
                            <div class="dropdown-user-details-email"><?php if (isset($_SESSION['loggedinuseremail'])) {
                                                            echo $_SESSION['loggedinuseremail'];
                                                        } ?></div>

                        </div>
                    </h6>
                  
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="viewCart.php">
                        <div class="dropdown-item-icon"><i data-feather="plus-circle"></i></div>
                        View Cart
                    </a>
                    <div class="dropdown-divider"></div>
                
                   <?php if(isset($_SESSION['loggedinuserrole'])){ 
                       if($_SESSION['loggedinuserrole']=="Admin"){
                       
                       ?>
                          <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="admin/dashboard.php">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Go to admin
                    </a>
                    <?php } } ?>                         
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
            <?php
}else{
?>
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid"
                        src="public/assets/img/illustrations/profiles/profile-1.png" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img"
                            src="public/assets/img/illustrations/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Guest</div>
                            <div class="dropdown-user-details-email">Guest</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php">
                        <div class="dropdown-item-icon"><i data-feather="user"></i></div>
                        Login
                    </a>
                    <a class="dropdown-item" href="register.php">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Register
                    </a>
                </div>
            </li>
            <?php
}
?>

        </ul>
    </nav>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');*{padding: 0px;margin: 0px}.icon{cursor: pointer;margin-right: 50px;line-height: 60px}.icon span{background: #f00;padding: 7px;border-radius: 50%;color: #fff;vertical-align: top;margin-left: -25px}.icon img{display: inline-block;width: 20px;margin-top: 4px}.icon:hover{opacity: .7}.logo{flex: 1;margin-left: 50px;color: #eee;font-size: 20px;font-family: monospace}.notifications{width: 300px;height: 0px;opacity: 0;position: absolute;top: 63px;right: 62px;border-radius: 5px 0px 5px 5px;background-color: #fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)}.notifications h2{font-size: 14px;padding: 10px;border-bottom: 1px solid #eee;color: #999}.notifications h2 span{color: #f00}.notifications-item{display: flex;border-bottom: 1px solid #eee;padding: 6px 9px;margin-bottom: 0px;cursor: pointer}.notifications-item:hover{background-color: #eee}.notifications-item img{display: block;width: 50px;height: 50px;margin-right: 9px;border-radius: 50%;margin-top: 2px}.notifications-item .text h4{color: #777;font-size: 16px;margin-top: 3px}.notifications-item .text p{color: #aaa;font-size: 12px}
    </style>

    <script>
        $(document).ready(function(){
            
            
            
        
            var down = false;
            
            $('#bell').click(function(e){
              
                var color = $(this).text();
                if(down){
                    
                    $('#box').css('height','0px');
                    $('#box').css('opacity','0');
                    down = false;
                }else{
                    
                    $('#box').css('height','auto');
                    $('#box').css('opacity','1');
                    down = true;
                    
                }
                
            });
                
                });
    </script>