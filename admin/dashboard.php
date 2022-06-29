<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<?php

if (isset($_SESSION['role']) == 'Admin') {
    header("location: admin/dashboard.php");
} elseif (isset($_SESSION['role']) == 'User') {
    header("location: ../index.php");
}
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    Dashboard
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mt-4">

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
                                            <h1 class="text-primary">Welcome to Catering Establishment Admin!</h1>
                                            <!-- <p class="text-gray-700 mb-0">Browse our fully designed UI toolkit! Browse our prebuilt app pages, components, and utilites, and be sure to look at our full documentation!</p> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                            src="../public/assets/img/illustrations/at-work.svg"
                                            style="max-width: 26rem" /></div>
                                </div>
                      

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Example Colored Cards for Dashboard Demo-->
                </div>
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>

</div>
<script>
    var pageLastVisit
    function getServerDateTime() {
        
        $.ajax({
            url: 'serverdt.php',
            type: 'POST',
            data: {
                'getServerDateTime': 1
            },
            success: function(data) {
              //  console.log(data);
                $('#date-time').html('');
                $('#date-time').html(data);
            }
        });
    }
    lastVisit();
    function lastVisit() {
        $.ajax({
            url: 'lastvisit.php',
            type: 'POST',
            data: {
                'lastVisit': 1
            },
            success: function(data) {
                console.log(data);
                pageLastVisit = data;
                // $('#last-visit').html('');
                // $('#last-visit').html(data);
            }
        });
    }
    function printLastPageVisit(){
        $('#last_page_visit').html('');
        document.getElementById('last_page_visit').innerHTML = pageLastVisit;
    }
    function getSessionVariables() {
        $.ajax({
            url: 'readsession.php',
            type: 'POST',
            data: {
                'getSessionVariables': 1
            },
            success: function(data) {
                data = JSON.parse(data);
                $('#session-name').html('');
                $('#session-age').html('');
                $('#session-name').html(data.username);
                $('#session-age').html(data.age);
            }
        });
    }
</script>