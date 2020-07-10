<?php
include_once 'class/include.php';


$category = '';
if (isset($_GET['category'])) {
    $category= $_GET['category'];
    $PROPERTY = new Property($category);
}
?>

<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Properties || Sri Lanka Properties</title>
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
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
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
                <div class="parallax page-header" style="background-image:url(images/page-header1.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Sales Listing</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="main" role="main">
                <div class="spacer-40"></div>
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="property-grid">
                                    <ul class="grid-holder col-3">
                                        <?php
                                        foreach (Property::getPropertysByCategory($category) as $property) :
                                            $CATEGORY = new Category($property['category']);
                                            $DISTRICT = new District($property ['district']);
                                            ?>
                                            <li class="grid-item type-rent">
                                                <div class="property-block">
                                                    <a href="member/view-property.php" class="property-featured-image">
                                                        <img src="upload/properties/<?= $property['image_name'] ?>" ><span class="images-count"><i class="fa fa-picture-o"></i> 2</span> 
                                                        <span class="badges"><?= $CATEGORY->name; ?></span>
                                                    </a>
                                                    <div class="property-info">
                                                        <h4><a href="member/view-property.php"><?= $property['title']; ?></a></h4>
                                                        <span class="location"><?= $DISTRICT->name; ?></span>
                                                        <p><?php echo substr($property['short_description'], 0, 60) . '...'; ?></p>
                                                        <div class="price"><strong>Rs</strong><span><?= number_format($property['price'], 2); ?></span></div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>                                                                                                                                                                   
                                </div>
                            </div>
                            <!-- Start Sidebar -->
                            <div class="sidebar right-sidebar col-md-3 serch-dev">
                                <div class="widget sidebar-widget">
                                    <h3 class="widgettitle">Search Properties</h3>
                                    <div class="full-search-form ">
                                        <form action="#">
                                            <select name="propery type" class="form-control input-lg selectpicker">
                                                <option selected>Type</option>
                                                <option>Houses</option>
                                                <option>Apartments</option>
                                                <option>Commercials</option>
                                                <option>Bungalows</option>
                                                <option>Villas</option>
                                            </select>
                                            <select name="propery contract type" class="form-control input-lg selectpicker">
                                                <option selected>Contract</option>
                                                <option>Rent</option>
                                                <option>Buy</option>
                                            </select>
                                            <select name="propery location" class="form-control input-lg selectpicker">
                                                <option selected>Location</option>
                                                <option>Colombo</option>
                                                <option>Maharagama</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                                        </form>
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