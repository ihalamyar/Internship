$(document).ready(function () {
    $('#make_event_btn').on('click', function (e) {
        e.preventDefault();
        let formData = new FormData(this.form);
        let event_title = $('#event_title').val();
        let event_description = $('#event_description').val();
        let event_speaker = $('#event_speaker').val();
        let event_created_at = $('#event_created_at').val();
        let event_endded_at = $('#event_endded_at').val();
        if (event_title === null || event_title.match(/^ *$/) !== null) {
            $('#event_title').focus();
            $('#event_ttile_error').text("What's the event title ?");
            return false;
        } else {
            $('#event_ttile_error').text("");
        }
        if (event_description === null || event_description.match(/^ *$/) !== null) {
            $('#event_description').focus();
            $('#event_description_error').text("Event must have description");
            return false;
        } else {
            $('#event_description_error').text("");
        }
        if (event_speaker === null || event_speaker.match(/^ *$/) !== null) {
            $('#event_speaker').focus();
            $('#event_speaker_error').text("What is the name of event speaker ?");
            return false;
        } else {
            $('#event_speaker_error').text("");
        }
        var exten = $("#event_image").val().split('.').pop().toLowerCase();
        if ($('#event_image').get(0).files.length === 0) {
            $('#event_image_error').text("Add Thumbnial");
        } else if (jQuery.inArray(exten, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
            $('#event_image_error').text("Only image are allowed");
        } else {
            $('#event_image_error').text("");
        }
        $.ajax({
            url: '/app/posts/event.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#event_message').html(data).show();
                $('#event_form')[0].reset();
            },
        });

    });
});
$(function () {
    jQuery('#event_created_at').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        defaultDate: new Date(),
    });
    jQuery('#event_endded_at').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        defaultDate: new Date(),
   });
 });
function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}

