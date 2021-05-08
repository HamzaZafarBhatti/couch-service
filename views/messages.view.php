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
                            <h5>Messages</h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0; text-transform: uppercase; font-size: 11px; text-align: center;">
                                <?php echo $errors; ?>
                            </div>
                        <?php endif; ?>
                        <div class="block table-block mb-4" style="margin-top: 20px;">
                            <div class="table-responsive">
                                <div id="user_details"></div>
                                <div id="user_model_details"></div>
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
        get_hosts_and_travellers();
        setInterval(function() {
            get_hosts_and_travellers();
            update_chat_history_data();
        }, 5000);
    });

    function get_hosts_and_travellers() {
        $.ajax({
            url: "get_hosts_and_travellers.php",
            method: "GET",
            success: function(data) {
                $('#user_details').html(data);
            }
        })
    }

    function make_chat_dialog_box(to_user_id, to_user_name) {
        var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="' + to_user_name + '">';
        modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
        modal_content += fetch_user_chat_history(to_user_id);
        modal_content += '</div>';
        modal_content += '<div class="form-group">';
        modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control"></textarea>';
        modal_content += '</div><div class="form-group" align="right">';
        modal_content += '<button type="button" name="cancel_chat" id="user_dialog_' + to_user_id + '" class="btn btn-danger" onclick="cancel_chat(this)">Close</button><button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat ml-2">Send</button></div></div>';
        $('#user_model_details').html(modal_content);
    }

    $(document).on('click', '.start_chat', function() {
        to_user_id = $(this).data('touserid');
        var to_user_name = $(this).data('toname');
        make_chat_dialog_box(to_user_id, to_user_name);
        $("#user_dialog_" + to_user_id).dialog({
            autoOpen: false,
            width: 400
        });
        $('#user_dialog_' + to_user_id).dialog('open');
    });

    function cancel_chat(elem) {
        $('#' + elem.id).dialog('close');
    }

    $(document).on('click', '.send_chat', function() {
        var to_user_id = $(this).attr('id');
        var chat_message = $('#chat_message_' + to_user_id).val();
        $.ajax({
            url: "send_message.php",
            method: "POST",
            data: {
                to_user_id: to_user_id,
                message: chat_message
            },
            success: function(data) {
                $('#chat_message_' + to_user_id).val('');
                $('#chat_history_' + to_user_id).html(data);
            }
        })
    });

    function fetch_user_chat_history(to_user_id) {
        $.ajax({
            url: "fetch_user_chat_history.php",
            method: "POST",
            data: {
                to_user_id: to_user_id
            },
            success: function(data) {
                $('#chat_history_' + to_user_id).html(data);
            }
        })
    }

    function update_chat_history_data() {
        $('.chat_history').each(function() {
            var to_user_id = $(this).data('touserid');
            fetch_user_chat_history(to_user_id);
        });
    }
</script>