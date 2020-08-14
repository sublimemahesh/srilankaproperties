//loging validation
$(document).ready(function () {

    $('#login').click(function (event) {
        event.preventDefault();

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#login_email').val() || $('#login_email').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!emailReg.test($('#login_email').val())) {
            swal({
                title: "Error!",
                text: "please enter a valid email",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#login_password').val() || $('#login_password').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the password..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {

            var formData = new FormData($("form#login-form")[0]);
            $.ajax({
                url: "ajax/loging.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "Invalid username or password!...",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        if ($('#remember').is(':checked')) {
                            
                            var username = $('#login_email').val();
                            var password = $('#login_password').val();
                            
                            // set cookies to expire in 14 days
                            $.cookie('username', username, { expires: 14 });
                            $.cookie('password', password, { expires: 14 });
                            $.cookie('remember', true, { expires: 14 });
                            window.location.replace("index.php");
                        } else {
                            // reset cookies
                            $.cookie('username', null);
                            $.cookie('password', null);
                            $.cookie('remember', null);
                            window.location.replace("index.php");
                        }
                        

                    }
                }
            });
        }
        return false;
    });

    $('#register').click(function (event) {

        event.preventDefault();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the name..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#phone').val() || $('#phone').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the phone number..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#email').val() || $('#email').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!emailReg.test($('#email').val())) {
            swal({
                title: "Error!",
                text: "please enter a valid email",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#password').val() || $('#password').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the password..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#terms-and-conditions').is(':checked')) {
            swal({
                title: "Error!",
                text: "Please accept the company terms and conditions..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {

            var formData = new FormData($("form#registration-form")[0]);
            $.ajax({
                url: "ajax/registration.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (result) {

                    if (result.status === 'emailex') {
                        swal({
                            title: "Error!",
                            text: "The email is already in use. Please sign in to your account!.",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        window.location.replace("index.php");

                    }
                }
            });
        }
        return false;
    });
    $('#send-email').click(function (event) {
        event.preventDefault();

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#login_email').val() || $('#login_email').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!emailReg.test($('#login_email').val())) {
            swal({
                title: "Error!",
                text: "please enter a valid email",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {

            var formData = new FormData($("form#send-email-form")[0]);
            $.ajax({
                url: "ajax/send-email.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "There was an error. Please try again later!... ",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if (result.status === 'email_does_not_exist') {
                        swal({
                            title: "Error!",
                            text: "Invalid email address!... ",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        swal({
                            title: "Success!",
                            text: "Password reset email was sent successfully!...",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        window.location.replace("reset-password.php");
                    }
                }
            });
        }
        return false;
    });
    $('#reset-password').click(function (event) {
        event.preventDefault();
        if (!$('#code').val() || $('#code').val().length === 0 || $('#code').val() == 0) {
            swal({
                title: "Error!",
                text: "Please enter the rest code..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#password').val() || $('#password').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the password",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#confirm-password').val() || $('#confirm-password').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the password",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if ($('#confirm-password').val() != $('#password').val()) {
            swal({
                title: "Error!",
                text: "Your new password & confirm password does not match!...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {

            var formData = new FormData($("form#reset-password-form")[0]);
            $.ajax({
                url: "ajax/reset-password.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "Please check your reset code!... ",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if (result.status === 'email_does_not_exist') {
                        swal({
                            title: "Error!",
                            text: "Invalid email address!... ",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        swal({
                            title: "Success!",
                            text: "Password was reset successfully!...",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        window.location.replace("login.php");
                    }
                }
            });
        }
        return false;
    });

});