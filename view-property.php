<?php
include_once 'class/include.php';
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $PROPERTY = new Property($id);
    $photos = PropertyPhoto::getPropertyPhotosByProperty($id);
    $CATEGORY = new Category($PROPERTY->category);
    $SUBCATEGORY = new SubCategory($PROPERTY->sub_category);
    $DISTRICT = new District($PROPERTY->district);
    $CITY = new City($PROPERTY->city);
}
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
          ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>View Sales Listing || Sri Lanka Properties</title>
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
                            <h1><?= $PROPERTY->title; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <!-- Site Showcase -->
            <div class="site-showcase">
            </div>
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-property">
                                    <div class="property-amenities clearfix">
                                        <span class="area"><strong>Category</strong><?= $CATEGORY->name; ?></span>
                                        <span class="area"><strong>Sub Category</strong><?= $SUBCATEGORY->name; ?></span>
                                        <span class="baths"><strong>District</strong><?= $DISTRICT->name; ?></span>
                                        <span class="beds"><strong>City</strong><?= $CITY->name; ?></span>
                                    </div>
                                    <div class="property-slider">
                                        <div id="property-images" class="flexslider">
                                            <ul class="slides">
                                                <?php
                                                foreach ($photos as $photo) {
                                                ?>
                                                    <li class="item"> <img src="upload/properties/gallery/<?= $photo['image_name']; ?>" alt=""> </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div id="property-thumbs" class="flexslider">
                                            <ul class="slides">
                                                <?php
                                                foreach ($photos as $photo) {
                                                ?>
                                                    <li class="item"> <img src="upload/properties/gallery/thumb/<?= $photo['image_name']; ?>" alt=""> </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><i class="fa fa-caret-down"></i> <a data-toggle="tab" href="#description"> Description </a> </li>
                                        <li class=""><i class="fa fa-caret-down"></i> <a data-toggle="tab" href="#features"> Features </a> </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="description" class="tab-pane active">
                                            <div class="additional-amenities">
                                                <div class="price"><strong>Rs.</strong><span><?= number_format($PROPERTY->price, 2); ?></span></div>
                                                <br />
                                                <span class="available"><i class="fa fa-check-square"></i> <strong>Location: </strong><?= $PROPERTY->location; ?></span>
                                                <?php
                                                if ($PROPERTY->housetype) {
                                                ?>
                                                    <br /><span class="available"><i class="fa fa-check-square"></i> <strong>House Type: </strong><?= $PROPERTY->housetype; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <?= $PROPERTY->description; ?>
                                        </div>
                                        <div id="features" class="tab-pane">
                                            <?= $PROPERTY->features; ?>
                                        </div>
                                    </div>
                                </div>
                                <h3>Related Properties</h3>
                                <hr>
                                <div class="property-grid">
                                    <div class="row">

                                        <?php
                                        $properties = Property::getPropertiesByCategory($PROPERTY->category);
                                        if (count($properties) - 1 > 0) {
                                        ?>
                                            <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
                                                <?php
                                                foreach ($properties as $property) :
                                                    if ($property['id'] != $PROPERTY->id) :
                                                        $CATEGORY = new Category($property['category']);
                                                        $DISTRICT = new District($property['district']);
                                                ?>

                                                        <li class="item property-block">
                                                            <a href="view-property.php?id=" class="property-featured-image">
                                                                <img src="upload/properties/<?= $property['image_name'] ?>" alt="">
                                                                <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                                                <span class="badges"><?= $CATEGORY->name; ?></span>
                                                            </a>
                                                            <div class="property-info">
                                                                <h4><a href="#"><?= $property['title']; ?></a></h4>
                                                                <span class="location"><?= $DISTRICT->name; ?></span>

                                                                <p><?php echo substr($property['short_description'], 0, 60) . '...'; ?></p>
                                                                <div class="price"><strong>Rs</strong><span><?= number_format($property['price'], 2); ?></span></div>
                                                            </div>
                                                        </li>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <h5>No any related properties in the database.</h5>
                                        <?php
                                        } ?>


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