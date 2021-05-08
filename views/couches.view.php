<?php require 'sidebar.view.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">
        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h5>Couch Surfing</h5>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0; text-transform: uppercase; font-size: 11px; text-align: center;">
                                <?php echo $errors; ?>
                            </div>
                        <?php endif; ?>
                        <div class="block table-block mb-4" style="margin-top: 20px;">

                            <div class="row">
                                <?php
                                if ($couches) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Available</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Available</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php foreach ($couches as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td>
                                                            <?php if ($row['is_available']) : ?>
                                                                <span class="badge badge-success">Available</span>
                                                            <?php else : ?>
                                                                <span class="badge badge-warning">Not Available</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['country']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td>
                                                            <a href="../controller/edit_couch.php?id=<?php echo $row['id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
                                                            <a onclick="alertdelete_<?php echo $row['id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
                                                            <script type="text/javascript">
                                                                function alertdelete_<?php echo $row['id']; ?>() {
                                                                    swal({
                                                                        title: "Are you sure?",
                                                                        text: "You will not be able to recover this item!",
                                                                        type: "warning",
                                                                        cancelButtonClass: "btn-default btn-sm",
                                                                        showCancelButton: true,
                                                                        confirmButtonClass: "btn-danger btn-sm",
                                                                        confirmButtonText: "Yes, delete it!",
                                                                        closeOnConfirm: false
                                                                    }, function() {
                                                                        window.location.href = "<?php echo SITE_URL ?>/controller/delete_couch.php?id=<?php echo $row['id']; ?>"
                                                                    });
                                                                }
                                                            </script>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>
                                <?php else : ?>
                                    <div class="p-2">No Data Found</div>
                                <?php endif; ?>
                            </div>
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
    })
</script>