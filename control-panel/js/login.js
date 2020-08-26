$(document).ready(function () {

    $('#login').click(function (event) {
        event.preventDefault();

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#username').val() || $('#username').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the user name..!",
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
        } else {

            var formData = new FormData($("form#login-form")[0]);
            $.ajax({
                url: "post-and-get/login.php",
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
                        if ($('#rememberme').is(':checked')) {
                            
                            var username = $('#username').val();
                            var password = $('#password').val();
                            
                            // set cookies to expire in 14 days
                            $.cookie('username', username, { expires: 31 });
                            $.cookie('password', password, { expires: 31 });
                            $.cookie('remember', true, { expires: 31 });
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
});