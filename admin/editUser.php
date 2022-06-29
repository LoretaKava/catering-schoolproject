<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>

            <!-- Main page content-->
            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->


                <div style="justify-content: center;margin-top: 20px" class="row">

                    <div class="col-xl-10">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Edit User Details</div>
                            <div class="card-body">
                                <form>
                                    <?php

                                    $sql = "SELECT * from users  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                    <label class="small mb-1" for="inputFullName">Full name</label>
                                                    <input class="form-control" id="inputFullName" type="text" placeholder="Enter full name" value="<?php echo $row1['full_name']; ?>" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $row1['email']; ?>" />
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (organization name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhoneNumber" type="number" placeholder="Enter your phone number" value="<?php echo $row1['phone']; ?>" />
                                                </div>
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Password</label>
                                                    <input class="form-control" id="inputPassword" type="text" placeholder="Enter your password" value="<?php echo $row1['password']; ?>" />
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->

                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Active Status</label>
                                                    <select class="form-control" id="inputActiveStatus" name="inputActiveStatus">
                                                        <?php if ($row1['status'] == 'Active'): ?>
                                                            <option value="Active" selected>Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        <?php elseif($row1['status'] == 'Inactive'): ?>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive" selected>Inactive</option>
                                                            <?php else: ?>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        <?php endif; ?>
                                                      
                                                    </select>
                                                                
                                                </div>
                                             
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBirthday">User Role</label>
                                                
                                                    <select class="form-control" id="inputRole">
                                                        <?php if ($row1['role'] == "Admin"): ?>
                                                        <option value="Admin" selected>Admin</option>
                                                        <option value="User"  >User</option>
                                                        <?php elseif ($row1['role'] == "User"): ?>
                                                        <option value="User" selected>User</option>
                                                        <option value="Admin"  >Admin</option>
                                                        <?php else: ?>
                                                        <option value="User" >User</option>
                                                        <option value="Admin"  >Admin</option>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                                        </div>
                                                        <div class="row gx-3 mb-3">
                                                            <!-- join request -->
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputPhone">Join Request</label>
                                                                <select class="form-control" id="join_request" name="join_request">
                                                                    <?php if ($row1['join_request'] == "Not Approved"): ?>
                                                                    <option value="Not Approved" selected>Not Approved</option>
                                                                    <option value="Approved"  >Approve</option>
                                                                    <option value="Rejected"  >Reject</option>
                                                                    <?php elseif ($row1['join_request'] == "Approved"): ?>
                                                                    <option value="Not Approved"  >Not Approved</option>
                                                                    <option value="Approved" selected>Approved</option>
                                                                    <option value="Rejected"  >Reject</option>
                                                                    <?php else: ?>
                                                                    <option value="Not Approved"  >Not Approved</option>
                                                                    <option value="Approved"  >Approved</option>
                                                                    <option value="Rejected" selected>Rejected</option>
                                                                    <?php endif ?>
                                                                  

                                                                </select>
                                                            </div>
                                                            <!-- payment method -->
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputPhone">Payment Method</label>
                                                                <select class="form-control" id="payment_method" name="payment_method">
                                                                    <?php if ($row1['payment_method'] == "Paypal"): ?>
                                                                    <option value="Paypal" selected>Paypal</option>
                                                                    <option value="Card"  >Card</option>
                                                                    <option value="Cash"  >Cash</option>
                                                                    <?php elseif ($row1['payment_method'] == "Card"): ?>
                                                                    <option value="Paypal"  >Paypal</option>
                                                                    <option value="Card" selected>Card</option>
                                                                    <option value="Cash"  >Cash</option>
                                                                    <?php else: ?>
                                                                    <option value="Paypal"  >Paypal</option>
                                                                    <option value="Card"  >Card</option>
                                                                    <option value="Cash" selected>Cash</option>
                                                                    <?php endif ?>
                                                                </select>
                                                        </div>

                                            <!-- Save changes button-->
                                            <button onclick="updateUser();" class="btn btn-primary mt-2" type="button">Save changes</button>
                                            </div>

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
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>

</div>

<script>
    function updateUser() {

        var inputFullName = document.getElementById("inputFullName").value;
        var inputActiveStatus = document.getElementById("inputActiveStatus").value;
        var inputEmailAddress = document.getElementById("inputEmailAddress").value;
        var inputPassword = document.getElementById('inputPassword').value;
        var inputPhoneNumber = document.getElementById('inputPhoneNumber').value;
        var id = document.getElementById('id').value;
        var inputRole = document.getElementById('inputRole').value;
        var join_request = document.getElementById('join_request').value;
        var payment_method = document.getElementById('payment_method').value;



        if (inputFullName == "" || inputFullName == "0"  || inputEmailAddress == "" || inputPassword == "" || inputPhoneNumber == "" || inputRole == ""|| join_request == "" || payment_method == "") {
            alert("Please fill all the fields");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'updateUser.php',
            data: {
                inputFullName: inputFullName,
                inputActiveStatus: inputActiveStatus,
                inputEmailAddress: inputEmailAddress,
                inputPassword: inputPassword,
                inputPhoneNumber: inputPhoneNumber,
                inputId: id,
                inputRole: inputRole,
                join_request: join_request,
                payment_method: payment_method

            },
            success: function(res) {
                alert(res);
             
                window.location.replace('allUsers.php');            
                console.log(res)
            }
        });

    }
</script>