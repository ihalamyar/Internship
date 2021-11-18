// fetch data
// $(document).ready(function () {
//     $('#fetch_profile_data_btn').click(function (e) {
//         e.preventDefault();
//         let id = $(this).attr('data-id');
//         $.ajax({
//             url: '/app/post_crud/profile_fetch.php',
//             method: 'POST',
//             data: {
//                 id: id,
//             },
//             dataType: 'json',
//             cache: false,
//             success: function (data) {
//                 $('#profile_bio').val(data.profile_bio);
//                 $('#profile_country').val(data.profile_country);
//                 $('#profile_age').val(data.profile_age);
//                 $('#profile_education').val(data.profile_education);
//                 $('#profile_id').val(data.profile_id);
//             }
//         });
//     });
//     return false;
// });
// update data
$(document).ready(function () {
    $('#edit_profile_btn').on('click', function (e) {
        e.preventDefault();
        let formData = new FormData(this.form);
        $.ajax({
            url: '/app/post_crud/profile_edit.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#update_profile_message').html(data).show();
            }
        });
    });
});

