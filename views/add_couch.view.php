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
                            <h5 class="text-truncate">Add Couch</h5>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-block mb-4">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" id="needs-validation">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="block col-md-12" style="padding-bottom: 35px">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" value="" placeholder="Title" name="title" id="title" class="form-control">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" value="" placeholder="Address" name="address" id="address" class="form-control">
                                                    <label class="control-label">City</label>
                                                    <input type="text" value="" placeholder="City" name="city" id="city" class="form-control">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" value="" placeholder="Country" name="country" id="country" class="form-control">
                                                    <label class="control-label">Available</label>
                                                    <select name="is_available" id="is_available" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <label class="control-label">Description</label>
                                                    <textarea rows="4" cols="50" name="description" class="form-control"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label">Images</label>
                                                    <input type="file" name="images" accept="image/*" multiple>
                                                </div>
                                            </div>
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
        $('#couches_nav').addClass('show');
        $('#couches_nav').siblings('.sub-menu').addClass('d-block');
        $('#add_couch_nav').addClass('active');
        $('input:file').fileuploader({
            extensions: ['jpg', 'png', 'jpeg', 'gif'],
            addMore: true,
        });
        var validator = $('#needs-validation').validate({
            rules: {
                title: {
                    required: true
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },
                description: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "Title is required field"
                },
                address: {
                    required: "Address is required field"
                },
                city: {
                    required: "City is required field"
                },
                country: {
                    required: "Country is required field"
                },
                description: {
                    required: "Description is required field",
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