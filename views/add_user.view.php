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

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


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