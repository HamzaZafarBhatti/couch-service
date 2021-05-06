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
                            <h5>Users</h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block">
                            <div class="block-body">
                                <form action="<?php echo SITE_URL . '/controller/add_role.php' ?>" method="post" id="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block table-block mb-4" style="margin-top: 20px;">

                            <div class="row">
                                <?php
                                if ($roles) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php
                                                foreach ($roles as $role) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $role['id']; ?></td>
                                                        <td class="text-capitalize"><?php echo $role['name']; ?></td>
                                                        <td>
                                                            <a onclick="editrole(this);" data-role_id="<?php echo $role['id']; ?>" style="font-size: 14px;color: #000000;" data-toggle="modal" data-target="#editModal"><i class="fa fa-cog"></i></a>
                                                            <a onclick="alertdelete(this);" data-role_id="<?php echo $role['id']; ?>" style="cursor: pointer;font-size: 14px;color: red;"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>
                                <?php else : ?>
                                    <div><?php echo $errors; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo SITE_URL . '/controller/edit_role.php' ?>" method="post">
            <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var validator = $('#needs-validation').validate({
            rules: {
                name: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Name is required field"
                },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function() {
                document.forms["needs-validation"].submit();
            }
        });
        // var validator = 

    });
    
    function editrole(element) {
        var value = element.getAttribute('data-role_id');
        $.ajax({
            url: "<?php echo SITE_URL . '/controller/get_role.php' ?>",
            data: {
                id: value
            },
            dataType: 'json',
            method: "POST",
            success: function(res) {
                if(res == 'null') {
                    console.log(res+': Role not Found');
                } else {
                    $('#edit_name').val(res.name);
                    $('#edit_id').val(res.id);
                }
            }
        });
    }

    function alertdelete() {
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
            window.location.href = "<?php echo SITE_URL ?>/controller/delete_role.php?id=<?php echo $role['id']; ?>"
        });
    }
</script>