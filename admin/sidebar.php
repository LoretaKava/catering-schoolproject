<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
              
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <?php

                    if ($_SESSION['loggedinuserrole'] == 'Admin') {

                    ?>
                        <a class="nav-link collapsed" href="dashboard.php">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboard
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Users
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="allUsers.php">
                                    All Users
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                            </nav>
                        </div>


                        <!-- Sidenav Accordion (Applications)-->

                        <!-- Sidenav Accordion (Flows)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Catering establishments
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addRestaurant.php">Add establishment</a>
                                <a class="nav-link" href="cateringEstablishmentDetail.php">View establishments</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#Menu" aria-expanded="false" aria-controls="Menu">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Menu
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Menu" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addCategory.php">Add Menu</a>
                                <a class="nav-link" href="allCategories.php">All Menues</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#CategoryItems" aria-expanded="false" aria-controls="CategoryItems">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Menu dishes
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="CategoryItems" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addMenuItem.php">Add dishes</a>
                                <a class="nav-link" href="allMenuItems.php">All dishes</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#quries" aria-expanded="false" aria-controls="quries">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Customer Orders
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="quries" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="orders.php">View</a>
                            </nav>
                        </div>
            
 
                        <a class="nav-link collapsed" href="../home.php" >
                            <div class="nav-link-icon"><i data-feather="globe"></i></div>
                           Go to website
                        </a>
      
                    <?php
                    } 
                    ?>

                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title"><?php if (isset($_SESSION['loggedinuseremail'])) {
                                                            echo $_SESSION['loggedinusername'];
                                                        } ?></div>
                </div>
            </div>
        </nav>
    </div>
</div>