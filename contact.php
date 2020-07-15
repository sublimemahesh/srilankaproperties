<?php
include_once 'class/include.php';
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
          ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Contact Us || Sri Lanka Properties</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
          ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
          ================================================== -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
    <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="contact-form/style.css" rel="stylesheet" type="text/css" />
    <link href="control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
    <!-- SCRIPTS
          ================================================== -->
    <script src="js/modernizr.js"></script><!-- Modernizr -->
</head>

<body>
    <!--[if lt IE 7]>
                <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div class="body">
            <!-- Start Site Header -->
            <?php include './header.php'; ?>
            <!-- End Site Header --> 
            <!-- Site Showcase -->
            <div class="site-showcase">
                <!-- Start Page Header -->
                 <div class="parallax page-header banner-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Contact Us</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <!-- Site Showcase -->
            <div class="site-showcase">
                <!-- Start Page Header -->

                <!-- End Page Header -->
            </div>
            <!-- Start Content -->
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="page">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h3 class="contact-mrg">Contact Form</h3>
                                    <div class="row">
                                        <!--                                            <form method="post" id="contactform" name="contactform" class="contact-form" action="https://demo1.imithemes.com/html/real-spaces/mail/contact.php">-->
                                        <div class="col-md-12 margin-15">
                                            <div class="form-group col-md-12">
                                                <input type="text" id="txtFullName" name="txtFullName" class="form-control input-lg" placeholder="Your Name" data-error="Write your name*">
                                                <span id="spanFullName"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Your Email" data-error="Write your valid email address*">
                                                <span id="spanEmail"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="txtContact" id="txtContact" class="form-control" placeholder="Your Contact Number">
                                                <span id="spanContact"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea cols="6" rows="5" name="txtMessage" id="txtMessage" class="form-control" placeholder="Your Message" data-error="Write your message*"></textarea>
                                                <span id="spanMessage"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!--                                                        <input type="text" id="captchacode" name="code" class="form-control input-lg" placeholder="Enter Code">-->
                                                <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter code ">
                                                <span id="capspan"></span>
                                            </div>
                                            <div class="form-group col-md-6 refresh-res">
                                                <div style="margin-top: -12px; margin-left: -15px;" class="mrg">
                                                    <?php include("./contact-form/captchacode-widget.php"); ?>
                                                </div>
                                                <img id="checking" src="contact-form/img/checking.gif" alt="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-lg btn-block submit-mrg c-form-submit submit submit-left" value="Submit now!">
                                        </div>
                                        <!--                                            </form>-->
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="message">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container">
                                        <div class="col-md-6 col-sm-6 contact-location-box box-mrg our-location">
                                            <h3>Our Location</h3>
                                            <div class="padding-as25 lgray-bg location-box">

                                                <p><i class="fa fa-phone" aria-hidden="true"></i><a href="#"><strong class="contact-icon">+94 70 277 3500</strong></a></p><br>
                                                <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><strong class="contact-icon">mail@synotec.lk </strong></a></p><br>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#"><strong class="contact-icon">No.55 Isipathanarama Rd, Maharagama 10280 </strong></a></p><br>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-6 contact-social-link contact-social-box location-box-s  contact-social-box">
                                            <h3>Add Our Social Media</h3>
                                            <div class="padding-as25 lgray-bg location-box-s">
                                                <p><strong>Please find us through the following social media</strong></p>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="copyrights-col-right ">
                                                            <div class="social-icons social-list">
                                                                <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-pinterest-square"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parallax page-header" id="contact-map">
                    <iframe src="https://maps.google.com/?ie=UTF8&amp;ll=40.717989,-74.002705&amp;spn=0.043846,0.077162&amp;t=m&amp;z=14&amp;output=embed" width="100%" height="220px"></iframe>
                </div>
            </div>
            <!-- Start Site Footer -->
            <?php include './footer.php'; ?>
            <!-- End Site Footer -->
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
        <script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
        <script src="plugins/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
        <script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
        <script src="control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script> <!-- UI -->
        <script src="js/waypoints.js"></script> <!-- Waypoints -->
        <script src="contact-form/scripts.js" type="text/javascript"></script>
</body>

</html>