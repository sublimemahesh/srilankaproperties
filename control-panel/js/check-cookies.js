$(document).ready(function () {
    var remember = $.cookie('remember');
    
    if (remember == 'true') {
       
        var username = $.cookie('username');
        var password = $.cookie('password');
        
        // autofill the fields
        $('#username').attr("value", username);
        $('#password').attr("value", password);
        $('#rememberme').attr("checked", "checked");

    }
})