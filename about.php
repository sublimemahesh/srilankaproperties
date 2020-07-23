<?php
include_once 'class/include.php';
$WHO_WE_ARE = new Page(1);
$VISION = new Page(2);
$MISSION = new Page(3);
$VALUES = new Page(4);
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
              ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>About Us || Sri Lanka Properties</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
              ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
              ================================================== -->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
    <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
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
            <div class="parallax page-header banner-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
        <div class="spacer-40"></div>
        <div class="container home-abt-img-padd">
            <div class="row">
                <div class="col-md-6 col-sm-6  text-m">
                    <img src="upload/page/<?= $WHO_WE_ARE->image_name; ?>" alt="" class="img-thumbnail">
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 abt-txt">
                        <div class="widget sidebar-widget featured-properties-widget">
                            <h3 class="widgettitle">CO / MD Message</h3>
                        </div>
                        <?= $WHO_WE_ARE->description; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="main" role="main">
            <div id="content" class="content full im-sec">
                <div class="container">
                    <div class="page">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="widget sidebar-widget featured-properties-widget">
                                    <h3 class="widgettitle">Our Importance</h3>
                                    <div class="pricing-table three-cols margin-0">
                                        <div class="pricing-column col-sm-4">
                                            <h3>Vision</h3>
                                            <div class="pricing-column-content">
                                                <ul class="features v-s">
                                                    <li><?= $VISION->description; ?></li>
                                                </ul>
                                                <div class="fact-ico-about abt-icon-m vision-sec">
                                                    <i class="fa fa-eye vision" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="values pricing-column highlight accent-color col-sm-4">
                                            <h3>Our Values<span class="highlight-reason"></span></h3>
                                            <div class="pricing-column-content">
                                                <ul class="features">
                                                    <li><?= $VALUES->description; ?></li>
                                                </ul>
                                                <div class="fact-ico-about">
                                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-column col-sm-4">
                                            <h3>Mission</h3>
                                            <div class="pricing-column-content">
                                                <ul class="features v-s">
                                                    <li><?= $MISSION->description; ?></li>
                                                </ul>
                                                <div class="fact-ico-about">
                                                    <i class="fa fa-rocket vision" aria-hidden="true"></i>
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
            <!-- Start Site Footer -->
            <?php include './footer.php'; ?>
            <!-- End Site Footer -->
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
        <script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
        <script src="plugins/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
        <script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
        <script src="js/helper-plugins.js"></script> <!-- Plugins -->
        <script src="js/bootstrap.js"></script> <!-- UI -->
        <script src="js/waypoints.js"></script> <!-- Waypoints -->
        <script src="js/init.js"></script> <!-- All Scripts -->
        <!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]-->
        <script src="style-switcher/js/jquery_cookie.js"></script>
        <script src="style-switcher/js/script.js"></script>
        <script src="js/custom.js" type="text/javascript"></script>
</body>

</html>