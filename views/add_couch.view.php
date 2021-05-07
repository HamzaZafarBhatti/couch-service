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
                            <h5 class="text-truncate">Couch Availables</h5>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="needs-validation">


                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="block col-md-12" style="padding-bottom: 35px">
                                            <span>
                                            <label class="control-label">Couch Images</label>
                                            <input type="file" value="" placeholder="Images of Couch" name="couch_img" id="couch_img" multiple  required="">

                                            <label class="control-label">Wish List Places</label>
                                            <input type="file" value="" placeholder="Wish List Places" name="wish_list" id="wish_list" multiple  required="">
                                            </span>
                                            <br><br>
                                            <label class="control-label">Available</label>
                                            <input type="text" value="" placeholder="Available " name="is_available" id="is_available" class="form-control" required="">
                                            <label class="control-label">From Date</label>
                                            <input type="datetime-local" value="" placeholder="From Date" name="from_date" id="from_date" class="form-control" required="">
                                            <label class="control-label">To Date</label>
                                            <input type="datetime-local" value="" placeholder="To Date" name="to_date" id="to_date" class="form-control" required="">
                                            <label class="control-label">Address</label>
                                            <input type="text" value="" placeholder="Address" name="address" id="address" class="form-control" required="">
                                            <label class="control-label">City</label>
                                            <input type="text" value="" placeholder="City" name="city" id="city" class="form-control" required="">
                                            <label class="control-label">Country</label>
                                            <input type="text" value="" placeholder="Country" name="country" id="country" class="form-control" required="">
                                            <br><br>
                                            <textarea rows="4" cols="50" name="comment" form="usrform"></textarea>
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