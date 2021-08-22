$(document).ready(function () {

    //Add to cart code shop page
    $('.waves-effect').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var email = $(this).closest('.subscribe').find('.validate').val();

        alert(email);

        // $.ajax({
        //     url: "/add-to-cart",
        //     method: "POST",
        //     data: {
        //         'email': email,
        //     },
        //     success: function (response) {
        //         alertify.set('notifier','position','top-right');
        //         alertify.success(response.status);
        //         cartload();
        //     },
        // });
    });
});
