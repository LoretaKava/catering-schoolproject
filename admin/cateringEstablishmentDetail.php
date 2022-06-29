<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';

if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
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
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Catering Establishment Details
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Catering Establishment Details</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Name</th>
                                    <th>Address</th>
                                    <th>Code</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody id="RestaurantList">


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>
    <script>
        loadWalkEvent();

        function loadWalkEvent() {
            document.getElementById("RestaurantList").innerHTML = "";
            $.post('loadRestaurant.php', {
                ID: "List"
            }, function(res) {
                document.getElementById("RestaurantList").innerHTML = res.trim();
            });
        }

        function deleteRestaurant(id) {


            $.ajax({
                type: 'POST',
                url: 'deleteRestaurant.php',
                data: {
                    Del_id: id
                },
                success: function(res) {
                    alert(res);
                    window.location.reload();
                    console.log(res)
                }
            });
        }
    </script>