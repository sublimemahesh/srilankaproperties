$(document).ready(function() {
    $('#btn-change').click(function(event) {
        event.preventDefault();

        $('#btn-change').hide();
        $('#update-loading').show();

        if (!$('#oldPass').val() || $('#oldPass').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the old password...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-change').show();
            $('#update-loading').hide();

        } else if (!$('#newPass').val() || $('#newPass').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the new password...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-change').show();
            $('#update-loading').hide();

        } else if (!$('#confPass').val() || $('#confPass').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please confirm password...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-change').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#change-password-form")[0]);

            $.ajax({
                url: "ajax/change-password.php",
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

                        $('#btn-change').show();
                        $('#update-loading').hide();

                        return false;
                    } else if (result.status === 'error1') {
                        swal({
                            title: "Error!",
                            text: "Your old password is wrong...",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-change').show();
                        $('#update-loading').hide();

                        return false;
                    } else if (result.status === 'error2') {
                        swal({
                            title: "Error!",
                            text: "Your new password and confim password is not matched...",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-change').show();
                        $('#update-loading').hide();

                        return false;
                    } else {
                        swal({
                            title: "Success.!",
                            text: "Your password changed successfully.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        window.location.replace("logout.php");
                    }
                }
            });
        }
        return false;
    });
});