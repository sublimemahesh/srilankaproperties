<?php
include_once 'class/include.php';

$id = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $PROPERTY = new Property($_GET['id']);
}
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
          ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Inquiry Form || Sri Lanka Properties</title>
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
    <link href="inquiry-form/style.css" rel="stylesheet" type="text/css" />
    <link href="control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
    <!-- SCRIPTS
          ================================================== -->
    <script src="js/modernizr.js"></script><!-- Modernizr -->
</head>

<body>
    <div class="body">
        <!-- Start Site Header -->
        <?php include './header.php'; ?>
        <!-- End Site Header -->
        <!-- Site Showcase -->
        <div class="site-showcase">
            <!-- Start Page Header -->
            <div class="parallax page-header" style="background-image:url(images/page-header1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Inquiry Form</h1>
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
                                <div class="col-md-12 col-sm-12">
                                    <h3 class="contact-mrg">Inquiry Form</h3>
                                    <div class="row">
                                        <form method="post" id="inquiry-form" name="inquiry-form" class="contact-form" action="">
                                            <div class="col-md-12 margin-15">
                                                <div class="form-group col-md-12">
                                                    <input type="text" id="txtFullName" name="txtFullName" class="form-control input-lg" placeholder="Your Name" data-error="Write your name*">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Your Email" data-error="Write your valid email address*">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="txtContact" id="txtContact" class="form-control" placeholder="Your Contact Number">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" id="txtAddress" name="txtAddress" class="form-control input-lg" placeholder="Your Address" data-error="Write your Address*">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" id="" name="" class="form-control input-lg" placeholder="Your Property" value="<?= $PROPERTY->title; ?>" readonly />
                                                    <input type="hidden" id="txtProperty" name="txtProperty" value="<?= $PROPERTY->id; ?>" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea cols="6" rows="5" name="txtMessage" id="txtMessage" class="form-control" placeholder="Your Message" data-error="Write your message*"></textarea>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter code">
                                                </div>
                                                <div class="form-group col-md-6  refresh-res inq-code">
                                                    <div style="margin-top: -12px; margin-left: 125px;" class="mrg">
                                                        <?php include("./contact-form/captchacode-widget.php"); ?>
                                                    </div>
                                                    <img id="checking" src="contact-form/img/checking.gif" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 button-mrg ">
                                                <input id="btn-inquiry" name="submit" type="submit" class="btn btn-primary btn-lg btn-block submit-mrg c-form-submit submit submit-left btn-m btn-i" value="Submit now!">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="message">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <!--<script src="js/helper-plugins.js"></script>  Plugins -->
        <script src="control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script> <!-- UI -->
        <script src="js/waypoints.js"></script> <!-- Waypoints -->
        <!--<script src="js/init.js"></script>  All Scripts -->
        <!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]-->
        <!--<script src="style-switcher/js/jquery_cookie.js"></script>-->
        <!--<script src="style-switcher/js/script.js"></script>-->
        <!--<script src="js/custom.js" type="text/javascript"></script>-->
        <!-- <script src="inquiry-form/scripts.js" type="text/javascript"></script> -->
        <script src="js/inquiry.js" type="text/javascript"></script>
</body>

</html>