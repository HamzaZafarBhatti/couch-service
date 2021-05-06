<?php require 'sidebar.view.php'; ?>

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">



        <!--Main Content-->

        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="block-heading d-flex align-items-center title-pages">
                            <h5 class="text-truncate">New User</h5>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="needs-validation">

                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">


                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="block col-md-12" style="padding-bottom: 35px">

                                            <label class="control-label">Name</label>
                                            <input type="text" placeholder="Name" name="name" value="<?php echo $user['name'] ?>" id="name" class="form-control" required="">
                                            <label class="control-label">Username</label>
                                            <input type="text" placeholder="Username" name="username" value="<?php echo $user['username'] ?>" id="username" class="form-control" required="">
                                            <label class="control-label">Email</label>
                                            <input type="email" placeholder="Email" name="email" value="<?php echo $user['email'] ?>" id="email" class="form-control" required="">
                                            <label class="control-label">Password</label>
                                            <input type="password" placeholder="Password" name="password" id="password" class="form-control" >
                                            <label class="control-label">Address</label>
                                            <input type="text" placeholder="Address" name="address" value="<?php echo $user['address'] ?>" id="address" class="form-control" required="">
                                            <label class="control-label">Phone No.</label>
                                            <input type="text" placeholder="PhoneNo" name="phone" value="<?php echo $user['phone'] ?>" id="phone" class="form-control" required="">
                                            <label class="control-label">City</label>
                                            <input type="text" placeholder="City" name="city" value="<?php echo $user['city'] ?>" id="city" class="form-control" required="">
                                            <label class="control-label">State</label>
                                            <input type="text" placeholder="State" name="state" value="<?php echo $user['state'] ?>" id="state" class="form-control" required="">
                                            <label class="control-label">Country</label>
                                            <input type="text" placeholder="Country" name="country" value="<?php echo $user['country'] ?>" id="country" class="form-control" required="">
                                            <br><br>    
                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var validator = $('#needs-validation').validate({
            rules: {
                username: {
                    required: true
                },
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                address: {
                    required: true,
                },
            },
            messages: {
                username: {
                    required: "Username is required field"
                },
                name: {
                    required: "Name is required field"
                },
                email: {
                    required: "Email is required field"
                },
                address: {
                    required: "Confirm Password is required field",
                },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function() {
                document.forms["needs-validation"].submit();
            }
        });
    });
</script>