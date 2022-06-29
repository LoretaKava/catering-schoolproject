<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';


if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
if(isset($_POST['updateStatus'])){
    $id = $_POST['id'];
    $status = $_POST['editOrderStatus'];
    $sql = "UPDATE orders SET `status` = '$status' WHERE id = '$id'";
    $run_query = mysqli_query($db, $sql);
    if($run_query){
        echo '<script>alert("Order status updated successfully")</script>';
    }else{
        echo '<script>alert("Order status update failed")</script>';
    }
}
?>
<!-- all OtherEvents -->
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
                                   Customer Orders 
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Customer Orders</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody id="orders">




                            </tbody>
                        </table>
                    </div>
                </div>
<!-- editOrderModal -->
<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editOrderForm">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="editOrderStatus">Status</label>
                        <select class="form-control" name="editOrderStatus">
                            <option value="Pending">Pending</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>

                    </div>
                    <div class="form-group">
                    <button type="submit" name="updateStatus" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- deleteOrderModal -->
                 
        </main>
    </div>
</div>
<?php
include '../admin/footer.php';
?>
<script>
        loadQuries();

function loadQuries() {
    document.getElementById("orders").innerHTML = "";
    $.post('loadOrders.php', {
        ID: "List"
    }, function(res) {
        document.getElementById("orders").innerHTML = res.trim();
    });
}

function deleteOrder(id) {


    $.ajax({
        type: 'POST',
        url: 'deleteQuery.php',
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
function editOrder(id) {
    document.getElementById("id").value = id;
    // show modal
    $('#editOrderModal').modal('show');
    // load data
 
    
}
</script>
</body>




