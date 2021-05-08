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
                            <h5 class="text-truncate">Update Couch</h5>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" id="needs-validation">
                            <input type="hidden" name="id" value="<?php echo $couch['id'] ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="block col-md-12" style="padding-bottom: 35px">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" value="<?php echo $couch['address'] ?>" placeholder="Address" name="address" id="address" class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label class="control-label">City</label>
                                                    <input type="text" value="<?php echo $couch['city'] ?>" placeholder="City" name="city" id="city" class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" value="<?php echo $couch['country'] ?>" placeholder="Country" name="country" id="country" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label">Available</label>
                                                    <select name="is_available" id="is_available" class="form-control">
                                                        <option value="1" <?php echo $couch['is_available'] ? 'selected' : ''; ?>>Yes</option>
                                                        <option value="0" <?php echo $couch['is_available'] ? '' : 'selected'; ?>>No</option>
                                                    </select>
                                                    <label class="control-label">Description</label>
                                                    <textarea rows="4" cols="50" name="description" class="form-control"><?php echo $couch['description'] ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label">Images</label>
                                                    <input type="file" name="images" accept="image/*" multiple>
                                                </div>
                                            </div>
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
        $('#couches_nav').addClass('show');
        $('#couches_nav').siblings('.sub-menu').addClass('d-block');
        $('#all_couches_nav').addClass('active');
        $('input:file').fileuploader({
            extensions: ['jpg', 'png', 'jpeg', 'gif'],
            addMore: true,
        });
        var validator = $('#needs-validation').validate({
            rules: {
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