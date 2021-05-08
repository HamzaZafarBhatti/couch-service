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


                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="block col-md-12" style="padding-bottom: 35px">

                                            <label class="control-label">Name</label>
                                            <input type="text" value="" placeholder="Name" name="name" id="name" class="form-control" required="">
                                            <label class="control-label">Username</label>
                                            <input type="text" value="" placeholder="Username" name="username" id="username" class="form-control" required="">
                                            <label class="control-label">Email</label>
                                            <input type="email" value="" placeholder="Email" name="email" id="email" class="form-control" required="">
                                            <label class="control-label">Password</label>
                                            <input type="password" value="" placeholder="Password" name="password" id="password" class="form-control" required="">
                                            <label class="control-label">Address</label>
                                            <input type="text" value="" placeholder="Address" name="address" id="address" class="form-control" required="">
                                            <label class="control-label">Phone No.</label>
                                            <input type="text" value="" placeholder="PhoneNo" name="phone" id="phone" class="form-control" required="">
                                            <label class="control-label">City</label>
                                            <input type="text" value="" placeholder="City" name="city" id="city" class="form-control" required="">
                                            <label class="control-label">State</label>
                                            <input type="text" value="" placeholder="State" name="state" id="state" class="form-control" required="">
                                            <label class="control-label">Country</label>
                                            <input type="text" value="" placeholder="Country" name="country" id="country" class="form-control" required="">
                                            <br><br>    
                                            <button type="submit" class="btn btn-primary">Save</button>

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
        $('#users_nav').addClass('show');
        $('#users_nav').siblings('.sub-menu').addClass('d-block');
        $('#add_user_nav').addClass('active');
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
                password: {
                    required: true,
                    minlength: 6
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
                password: {
                    required: "Password is required field",
                    minlength: "Password should be at least 6 characters"
                },
                address: {
                    required: "Address is required field",
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