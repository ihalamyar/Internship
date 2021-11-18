$(document).ready(function () {
    $(document).on('click', '#apply_btn', function (e) {
        e.preventDefault();
        let purchase_user_id = $('#purchase_user_id').val();
        let purchase_post_id = $('#purchase_post_id').val();
        $.ajax({
            url: '/app/posts/apply.php',
            method: 'POST',
            data: $("#form_apply").serialize(),
            success: function (data) {
                $('#apply__message').html(data);
                $('#apply__message').show();
            },

        });
    });
});

// approve the course 

$(document).ready(function () {
    $('.approveBtn').click(function () {
        const id = $(this).attr('id');
        let ask = confirm('Are you sure ?');
        if (ask) {
            $.post('/app/posts/approve.php',
                {
                    id: id
                });
                location.reload();
        }
    });

});