$(document).ready(function () {
    $('#payment_receipt_btn').on('click', function (e) {
        e.preventDefault();
        let formData = new FormData(document.getElementById("payment_receipt_form"));
        let user_pay_id = $('#user_pay_id').val();
        let enroll_pay_id = $('#enroll_pay_id').val();
        let payment_file = $('#payment_file').val();
        if (user_pay_id == '') {
            $('#user_pay_id').focus();
            return false
        }
        if (enroll_pay_id == '') {
            $('#enroll_pay_id').focus();
            return false
        }
        if (payment_file == '') {
            $('#payment_file').focus();
            return false
        }
        $.ajax({
            url: '/app/post_crud/payment_receipt.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#payment_cucess_message').html(data).show();
            }
        });
    });
});

