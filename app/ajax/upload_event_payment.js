$(document).ready(function () {
    $('#event_joinBtn').on('click', function (e) {
        e.preventDefault();
        let formData = new FormData(document.getElementById("join_event_form"));
        let join_event_id = $('#join_event_id').val();
        let event_join_file = $('#event_join_file').val();
        if (join_event_id == '') {
            $('#join_event_id').focus();
            return false
        }
        if (event_join_file == '') {
            $('#event_join_file').focus();
            return false
        }
        $.ajax({
            url: '/app/post_crud/upload_event_payment.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#join_event_message').html(data).show();
            }
        });
    });
});

