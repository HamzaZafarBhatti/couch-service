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
                            <h5>Book Couch</h5>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <div class="block">
                            <div class="block-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Search</label>
                                            <input type="text" id="search" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" id="city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" id="country" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="search_btn" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-12 mt-4">
                        <div class="row" id="couch_list">
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
                <h5 class="modal-title" id="editModalLabel">Book Couch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo SITE_URL . '/controller/book_couch.php' ?>" method="post">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="datetime-local" name="date_from" class="form-control" required>
                        <label>Date To</label>
                        <input type="datetime-local" name="date_to" class="form-control" required>
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
        $('#couch_list_nav').addClass('active');
        get_filtered_couches();

        $('#search_btn').on('click', function() {
            var search = $('#search').val();
            var city = $('#city').val();
            var country = $('#country').val();
            get_filtered_couches(search, city, country);
        })
    });

    function get_couch(elem) {
        var id = elem.getAttribute('data-id');
        $('#edit_id').val(id);
    }

    function get_filtered_couches(search = '', city = '', country = '') {
        $.ajax({
            url: "get_filtered_couches.php",
            data: {
                search: search,
                city: city,
                country: country,
            },
            method: "post",
            success: function(data) {
                $('#couch_list').html(data);
            }
        })
    }
</script>