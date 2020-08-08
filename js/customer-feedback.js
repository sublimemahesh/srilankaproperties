$(document).ready(function () {

    jQuery("#txtFullName").blur(function () {
        validateEmpty("txtFullName", "spanFullName");
    });

    jQuery("#txtTitle").blur(function () {
        validateEmpty("txtTitle", "spanTitle");
    });

    jQuery("#imageName").blur(function () {
        validateEmpty("imageName", "spanImageName");
    });

    jQuery("#txtComment").blur(function () {
        validateEmpty("txtComment", "spanComment");
    });

    jQuery("#captchacode").blur(function () {
        validateEmpty("captchacode", "capspan");
    });


    $('#btnSubmit').click(function (e) {
        
        e.preventDefault();
        if (!validate()) {
            return;
        }
        // jQuery("#checking").show();


        var formData = new FormData($('#guestcomment')[0]);

        $.ajax({
            url: "ajax/customer-feedback.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {
                if (mess.message == 'captchaerror') {
                    Swal.fire({
                        title: "Error",
                        text: "Security code is invalid.",
                        icon: "warning",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false

                    });
                    return false;
                } else if (mess.message == 'error') {
                    Swal.fire({
                        title: "Error",
                        text: "There was an error.",
                        icon: "warning",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false

                    });
                    return false;
                } else {
                    Swal.fire({
                        title: "Success",
                        text: "Your comment has been posted successful.",
                        icon: "success",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false

                    });

                    $('#txtFullName').val("");
                    $('#txtTitle').val("");
                    $('#imageName').val("");
                    $('#txtComment').val("");
                    $('#captchacode').val("");


                }


                setTimeout(function () {
                    location.reload();
                }, 1000);

            },
            cache: false,
            contentType: false,
            processData: false
        });

    });
});
function validate() {

    if (
        validateEmpty("txtFullName", "spanFullName") &
        validateEmpty("txtTitle", "spanTitle") &
        validateEmpty("imageName", "spanImageName") &
        validateEmpty("txtComment", "spanComment") &
        validateEmpty("captchacode", "capspan")

    ) {
        return true;
    } else {

        return false;
    }
}

function validateEmpty(field, validatorspan) {

    if (jQuery('#' + field).val().length != 0) {

        jQuery('#' + validatorspan).addClass("validated");
        jQuery('#' + validatorspan).removeClass("notvalidated");
        jQuery('#' + validatorspan).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatorspan).text("");

        return true;
    } else {

        jQuery('#' + validatorspan).addClass("notvalidated");
        jQuery('#' + validatorspan).removeClass("validated");
        jQuery('#' + validatorspan).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatorspan).text("This field can not be empty");

        return false;
    }
}