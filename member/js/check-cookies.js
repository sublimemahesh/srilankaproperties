$(document).ready(function () {
    var remember = $.cookie('remember');
    
    if (remember == 'true') {
       
        var username = $.cookie('username');
        var password = $.cookie('password');
        
        // autofill the fields
        $('#login_email').attr("value", username);
        $('#login_password').attr("value", password);
        $('#remember').attr("checked", "checked");

    }
})