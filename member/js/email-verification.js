$(document).ready(function() {

    var email_verified = $('#email_verified').val();
    var pathname = window.location.pathname.split('/').pop();
    var basic_data_verify = $('#basic_data_verify').val();

    if (email_verified == '0') {
        if (pathname != 'primary-contact-details.php') {
            window.location.replace("primary-contact-details.php");
        } else {
            $('#alert_verify').show();
            $("#alert_verify").fadeTo(6000, 500).slideUp(500, function() {
                $("#alert_verify").slideUp(500);
            });
        }
    }

    if (basic_data_verify == '0') {
        if (pathname != 'primary-contact-details.php' && pathname != 'edit-profile.php') {
            window.location.replace("edit-profile.php");
        } else {
            $('#alert_profile').show();
            $("#alert_profile").fadeTo(6000, 500).slideUp(500, function() {
                $("#alert_profile").slideUp(500);
            });
        }
    }

    $('#send_email_verification').click(function() {

        $('#send_email_verification').prop("disabled", true);
        $('#send_email_verification_loader').show();
        var member_id = $('#member_id').val();

        $.ajax({
            url: "ajax/primary-contact-details.php",
            type: "POST",
            data: {
                member_id: member_id,
                action: 'send_email_verification'
            },
            dataType: "JSON",
            success: function(jsonStr) {

                if (jsonStr.status == 'success') {
                    swal({
                        title: "Success!",
                        text: "The verification code sent successfully to your email.",
                        type: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $('#email_verification_li').show();
                    $('#send_email_verification_loader').hide();
                    $('#send_email_verification').val("Didn't received, Send a code again.");
                    var timer2 = "2:01";
                    var interval = setInterval(function() {
                        var timer = timer2.split(':');
                        //by parsing integer, I avoid all extra string processing
                        var minutes = parseInt(timer[0], 10);
                        var seconds = parseInt(timer[1], 10);
                        --seconds;
                        minutes = (seconds < 0) ? --minutes : minutes;
                        seconds = (seconds < 0) ? 59 : seconds;
                        seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //minutes = (minutes < 10) ?  minutes : minutes;
                        $('#countdown_e').html(minutes + ':' + seconds);
                        if (minutes < 0)
                            clearInterval(interval);
                        //check if both minutes and seconds are 0
                        if ((seconds <= 0) && (minutes <= 0))
                            clearInterval(interval);
                        timer2 = minutes + ':' + seconds;
                    }, 1000);
                    setTimeout(
                        function() {
                            $('#send_email_verification').prop("disabled", false);
                            $('#countdown_e').text("");
                        }, 121000);
                    return false;
                } else {
                    swal({
                        title: "Error!",
                        text: "There was a problem sending the verification code.",
                        type: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $('#send_email_verification').prop("disabled", false);
                    $('#send_email_verification_loader').hide();
                    return false;
                }
            }
        });
    });

    $('#verify_email').click(function() {
        var member_id = $('#member_id').val();
        var email_verification_code = $('#email_verification_code').val();

        if (!email_verification_code || email_verification_code.length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the verification code.",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            });
            $("#email_verification_code").focus();
            $("#email_verification_code").val("");
            return false;
        } else {
            $.ajax({
                url: "ajax/primary-contact-details.php",
                type: "POST",
                data: {
                    member_id: member_id,
                    email_verification_code: email_verification_code,
                    action: 'email_verification_code'
                },
                dataType: "JSON",
                success: function(jsonStr) {
                    if (jsonStr.status == 'incorrect') {
                        swal({
                            title: "Incorrect!",
                            text: "The verification code you have entred is incorrect.",
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });
                        $("#email_verification_code").focus();
                        $("#email_verification_code").val("");
                        return false;
                    } else if (jsonStr.status == 'error') {
                        swal({
                            title: "Error!",
                            text: "There was a problem sending the verification code.",
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });
                        $("#phone_verification_code").focus();
                        $("#phone_verification_code").val("");
                        return false;
                    } else if (jsonStr.status == 'success') {
                        swal({
                            title: "Success!",
                            text: "The email is verified successfully",
                            type: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });

                        $('#email_verification_li').hide();
                        $('#send_email_verification_li').hide();
                        $('#lb_verified_email').text("Verified");
                        $('#lb_verified_email').addClass('text-success').removeClass('text-danger');
                        return false;
                    }
                }
            });
        }

    });

    $('#btn_change_email').click(function() {
        var lbl_email = $('#lbl_email').text();
        swal({
            title: "Change Email!",
            text: lbl_email,
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Enter the new email"
        }, function(email) {

            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if (email === false)
                return false;
            if (!email || email.length === 0) {
                swal.showInputError("Please enter a email!");
                return false;
            }
            if (!re.test(email)) {
                swal.showInputError("Please enter a valid email!");
                return false;
            }
            swal.close();

            $('#send_email_verification').prop("disabled", true);
            $('#send_email_verification_li').show();
            $('#send_email_verification_loader').show();
            var member_id = $('#member_id').val();
            $.ajax({
                url: "ajax/primary-contact-details.php",
                type: "POST",
                data: {
                    member_id: member_id,
                    email: email,
                    action: 'change_email'
                },
                dataType: "JSON",
                success: function(jsonStr) {
                    if (jsonStr.status == 'success') {

                        $('#lb_verified_email').text("Not Verified");
                        $('#lb_verified_email').addClass('text-danger').removeClass('text-success');
                        $('#lbl_email').text(jsonStr.email);

                        swal({
                            title: "Success!",
                            text: "The verification code sent successfully to your email",
                            type: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });
                        $('#email_verification_li').show();
                        $('#send_email_verification_li').show();
                        $('#send_email_verification_loader').hide();
                        $('#send_email_verification').val("Didn't received, Send a code again.");
                        var timer2 = "2:01";
                        var interval = setInterval(function() {
                            var timer = timer2.split(':');
                            //by parsing integer, I avoid all extra string processing
                            var minutes = parseInt(timer[0], 10);
                            var seconds = parseInt(timer[1], 10);
                            --seconds;
                            minutes = (seconds < 0) ? --minutes : minutes;
                            seconds = (seconds < 0) ? 59 : seconds;
                            seconds = (seconds < 10) ? '0' + seconds : seconds;
                            //minutes = (minutes < 10) ?  minutes : minutes;
                            $('#countdown_p').html(minutes + ':' + seconds);
                            if (minutes < 0)
                                clearInterval(interval);
                            //check if both minutes and seconds are 0
                            if ((seconds <= 0) && (minutes <= 0))
                                clearInterval(interval);
                            timer2 = minutes + ':' + seconds;
                        }, 1000);
                        setTimeout(
                            function() {
                                $('#send_email_verification').prop("disabled", false);
                                $('#countdown_p').text("");
                            }, 121000);
                        return false;
                    } else {
                        swal({
                            title: "Error!",
                            text: "There was a problem sending the verification code.",
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });
                        $('#send_email_verification').prop("disabled", false);
                        $('#send_email_verification_loader').hide();
                        return false;
                    }
                }
            });

        });
    });

});