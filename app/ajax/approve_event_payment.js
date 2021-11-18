$(document).ready(function () {
    $('.approve_eventBtn').click(function () {
        const id = $(this).attr('id');
        let ask = confirm('Are you sure ?');
        if (ask) {
            $.post('/app/posts/approve_event_payment.php',
                {
                    id: id
                });
                location.reload();
        }
    });

});