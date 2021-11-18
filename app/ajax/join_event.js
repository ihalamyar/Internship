$(document).ready(function () {
    $('.join_event_Btn').on('click', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: '/app/posts/join_event.php',
            data: { id: id },
            success: function (data) {
                $('#join_event_message').html(data).show();
            }
        });
    });
});

