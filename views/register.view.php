<section style="background: url(http://via.placeholder.com/1920x1080)); background-size: cover">
    <div class="height-100-vh bg-primary-trans">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <img src="../assets/images/wbdashboard.png" style="margin-top: 70px; max-width: 200px; display: block; text-align: center; margin-left: auto; margin-right: auto;">
                    <div class="login-div" style="padding-top: 20px;margin: 30px auto 30px; margin-bottom: 15px">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login" id="needs-validation" novalidate>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control input-lg" placeholder="Username" name="username" id="username" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control input-lg" placeholder="Email" name="email" id="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control input-lg" placeholder="Password" name="password" type="password" id="password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control input-lg" placeholder="Confirm Password" id="confirm_password" name="confirm_password" type="password" required>
                            </div>
                            <div class="form-group">
                                <p>Already have an account? <a href="<?php echo  SITE_URL . '/controller/login.php' ?>">Sign In</a></p>
                            </div>

                            <button class="btn btn-primary mt-2" type="submit" style="width: 100%">Sign Up</button>

                            <?php if (!empty($errors)) : ?>

                                <div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0; text-transform: uppercase; font-size: 11px; text-align: center;">

                                    <?php echo $errors; ?>

                                </div>

                            <?php endif; ?>

                        </form>
                    </div>
                    <div style="text-align: center; color: #fff; font-size: 10px;">
                        Copyrights <a href="#" target="_blank" style="color: #fff; font-weight: bold;">Online Couch Surfing</a>
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
                email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                username: {
                    required: "Username is required field"
                },
                email: {
                    required: "Email is required field"
                },
                password: {
                    required: "Password is required field",
                    minlength: "Password should be at least 6 characters"
                },
                confirm_password: {
                    required: "Confirm Password is required field",
                    equalTo: "Both passwords should match"
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