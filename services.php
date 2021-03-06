<?php
include './class/include.php';
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
                  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Services || Sri Lanka Properties</title>
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
    <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
    <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
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
            <div class="site-showcase">
                <!-- Start Page Header -->
                <div class="parallax page-header banner-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Services</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
        <!-- Start Content -->
        <div class="main" role="main">
            <div id="content" class="content full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="property-listing">
                                <ul>
                                    <?php
                                    $services = Service::all();
                                    if (count($services) > 0) {
                                        foreach ($services as $service) {
                                    ?>
                                            <li class="type-rent col-md-12 col-sm-12">
                                                <div class="col-md-6 col-sm-6">
                                                    <img src="upload/service/<?= $service['image_name']; ?>" alt=""></a>
                                                </div>
                                                <div class="col-md-6 col-sm-6 serv-des">
                                                    <div class="property-info">
                                                        <h3><a><?= $service['title']; ?></a></h3>
                                                        <?= $service['description']; ?>
                                                        <a href="contact.php">
                                                            <button type="button" class="btn btn-primary s-btn">Learn More</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>

                                </ul>
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

</body>

</html>