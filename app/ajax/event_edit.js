// this script is to update the event
// eevnt_edit.php
$(document).ready(function () {
    $('#event_edit_btn').on('click', function (e) {
        e.preventDefault();
        let formData = new FormData(this.form);
        $.ajax({
            url: '/app/post_crud/event_edit.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#edit_event_message').html(data).show();
            }
        });
    });
});