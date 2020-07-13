$(document).ready(function() {
    $('#btn-inquiry').click(function(event) {
        event.preventDefault();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        // $('#btn-inquiry').hide();
        // $('#update-loading').show();

        if (!$('#txtFullName').val() || $('#txtFullName').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the full name...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!$('#txtEmail').val() || $('#txtEmail').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!emailReg.test($('#txtEmail').val())) {
            swal({
                title: "Error!",
                text: "please enter a valid email",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!$('#txtContact').val() || $('#txtContact').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the phone number...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!$('#txtAddress').val() || $('#txtAddress').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the address...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!$('#txtProperty').val() || $('#txtProperty').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the property...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!$('#txtMessage').val() || $('#txtMessage').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the message...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else if (!$('#captchacode').val() || $('#captchacode').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the captcha code...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-inquiry').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#inquiry-form")[0]);

            $.ajax({
                url: "ajax/inquiry.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "There was an error. Please try again later",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-update').show();
                        $('#update-loading').hide();

                        return false;
                    } else if (result.status === 'error_captcha') {
                        swal({
                            title: "Error!",
                            text: "Security Code is invalid.",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-update').show();
                        $('#update-loading').hide();

                        return false;
                    } else {
                        swal({
                            title: "Success.!",
                            text: " Your inquiry details saved successfully.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        location.reload();
                        // window.location.replace("edit-profile.php");
                    }
                }
            });
        }
        return false;
    });
});