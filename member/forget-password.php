<?php
include_once(dirname(__FILE__) . '/../class/include.php');
session_start();
if (isset($_SESSION['m_id'])) {
    header('Location: ./');
}
?>
<!doctype html>
<html lang="en">
    <head>
          <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <title>Sri Lanka properties</title>
        <!-- Favicon Icon Css -->
        <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
        <!-- Animation CSS -->
        <link rel="stylesheet" href="../css/animate.css" type="text/css">  
        <!-- Font Css -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap Css --> 
        <!--        <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">-->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <!-- main css --> 
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="css/responsive.css" type="text/css" rel="stylesheet">
        <link href="css/custom.css" type="text/css" rel="stylesheet">
        <link href="../control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
    </head>
    <body class="theme-2">
        <div class="container text-center">
            <img src="../images/realstate/sl-property-logo.png" class="logo-login logo-f" style="width: 150px"/><B class="memberr-log"></B>
        </div>
        <!-- Start My Account Section -->
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6  col-md-offset-3 mb-4 mb-md-0">
                        <div class="title-f">
                            <h4>Forget Password</h4>
                        </div>
                        
                        <small>Please enter your emil address to change password or username.
                    We will send a link to your email...</small>
                        <form method="post" class="login_form " id="send-email-form">
                            <div class="form-group">
                                <label>Email <span class="required text-danger">*</span></label>
                                <input type="email" required="" class="form-control" name="login_email"  id="login_email">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="send_email" id="send-email" value="Log in">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End My Account Section -->
        <!-- End Quickview Popup Section -->
        <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
          <!-- Jquery js -->
      <script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- Custom css -->
        <script src="js/custom.js" type="text/javascript"></script> 
        <script src="js/city.js" type="text/javascript"></script> 
        <script src="js/login.js" type="text/javascript"></script> 
    </body>
</html>	