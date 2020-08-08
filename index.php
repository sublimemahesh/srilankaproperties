<?php
include_once 'class/include.php';

$COMMENT = new Comments(NULL);
$comments = $COMMENT->all();
?>
<!DOCTYPE HTML>
<html class="no-js">

    <head>
        <!-- Basic Page Needs
              ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Sri Lanka Properties</title>
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
        <link href="control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
        <!-- Color Style -->
        <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
        <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="js/chosen/chosen.css" rel="stylesheet" type="text/css" />
        <!-- SCRIPTS
              ================================================== -->
        <script src="js/modernizr.js"></script><!-- Modernizr -->
    </head>

    <body class="home">
        <!--[if lt IE 7]>
                    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->
        <div class="body">
            <!-- Start Site Header -->
            <?php include './header.php'; ?>
            <!-- End Site Header -->
            <?php include './slider.php'; ?>

            <!-- Start Content -->
            <div class="main index-set" role="main">
                <div id="content" class="content full">
                    <div class="featured-blocks">
                        <div class="featured-blocks">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    foreach (Category::all() as $category) :
                                        ?>

                                        <div class="col-md-4 col-sm-4 featured-block"> <img src="upload/category/<?= $category['image_name'] ?>" alt="" class="img-thumbnail">
                                            <h3 class="circle-title"><?php echo $category['name']; ?></h3>
                                            <p><?php echo substr($category['short_description'], 0, 60) . '...'; ?></p>
                                            <a href="properties.php?category=<?= $category['id']; ?>" class="btn btn-sm btn-primary read-more">View More</a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="spacer-40"></div>
                        <div class="site-showcase">
                            <div class="slider-mask overlay-transparent"></div>
                            <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
                                <ul class="slides add">
                                    <?php if (COUNT(Advertisement::all())) : ?>
                                        <?php foreach (Advertisement::all() as $ad) : ?>
                                            <li class="parallax" style="background-image:url(upload/advertisement/<?= $ad['image_name'] ?>);" onclick="location.href = '<?= $ad['url'] ?>';"></li>

                                        <?php endforeach; ?>
                                    <?php else : ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="spacer-40"></div>
                        <div id="featured-properties">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block-heading">
                                            <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Featured Properties</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    foreach (Property::getAllPropertiesByActiveMembers() as $key => $property) :
                                        if ($key < 20) :
                                            $CATEGORY = new Category($property['category']);
                                            $SUBCATEGORY = new SubCategory($property['sub_category']);
                                            $DISTRICT = new District($property['district']);
                                            $CITY = new City($property['city']);
                                            ?>

                                            <div class="col-md-3 col-sm-4">
                                                <div class="item property-block">
                                                    <a href="view-property.php?id=<?= $property['id'] ?>" class="property-featured-image">
                                                        <img src="upload/properties/<?= $property['image_name'] ?>">

                                                        <?php
                                                        if ($property['no_of_bed_rooms'] != 0) {
                                                            ?>
                                                            <span class="images-count">
                                                                <i class="fa fa-bed bd"></i><?= $property['no_of_bed_rooms']; ?></span>
                                                            <?php
                                                        }
                                                        ?>

                                                        <span class="badges"><?= $CATEGORY->name; ?></span>
                                                    </a>
                                                    <div class="property-info">
                                                        <h4>
                                                            <a href="view-property.php?id=<?= $property['id']; ?>" title="<?= $property['title'] ?>">
                                                                <?php
                                                                if (strlen($property['title']) > 22) {
                                                                    echo substr($property['title'], 0, 20) . '...';
                                                                } else {
                                                                    echo $property['title'];
                                                                }
                                                                ?>
                                                            </a>
                                                        </h4>
                                                        <span class="location"><?= $DISTRICT->name; ?> <i class='fa fa-chevron-right'></i>

                                                            <?php
                                                            if (strlen($CITY->name) > 14) {
                                                                echo substr($CITY->name, 0, 10) . '...';
                                                            } else {
                                                                echo $CITY->name;
                                                            }
                                                            ?>

                                                        </span>
                                                        <span class="category"><i class='fa fa-list'></i>
                                                            <?php
                                                            if (strlen($CATEGORY->name) > 17) {
                                                                echo substr($CATEGORY->name, 0, 17);
                                                            } else {
                                                                echo $CATEGORY->name;
                                                            }
                                                            ?>
                                                            <i class='fa fa-chevron-right'></i> <?= $SUBCATEGORY->name; ?>
                                                        </span>

                                                        <div class="price"><strong>Rs</strong><span><?= number_format($property['price'], 2); ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="padding-t50b20 bottom-blocks">
                                    <div class="container">
                                        <div class="row">
                                            <div class="row testi-row">
                                                <div class="col-md-12 col-sm-12 latest-testimonials column">
                                                    <div class="row client-title-bar">
                                                        <div class="block-heading">
                                                            <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Client Testimonials</h4>
                                                        </div>
                                                    </div>
                                                    <ul class="testimonials owl-carousel img-thumbnail testi-padd test-bottom" id="clients-slider" data-columns="1" data-autoplay="yes" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-mobile="1" data-items-tablet="1">
                                                        <?php
                                                        if (count($comments) > 0) {
                                                            foreach ($comments as $key => $comment) {
                                                                if ($key < 6) {
                                                                    ?>
                                                                    <li>
                                                                        <p class="testi-content"><?php echo $comment['comment']; ?></p>
                                                                        <div class="spacer-40"></div>
                                                                        <img src="upload/comments/<?php echo $comment['image_name']; ?>" alt="Happy Client" class="testimonial-sender img-circle rounded-circle img-width">
                                                                        <br><cite><strong><?php echo $comment['name']; ?></strong>
                                                                        </cite>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                        } else {
                                                            ?>
                                                            <h6>There no any comments in database</h6>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Sidebar -->
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
            <script src="plugins/prettyphoto/js/prettyphoto.js"></script>
            <!--PrettyPhoto Plugin -->
            <script src="plugins/owl-carousel/js/owl.carousel.min.js"></script>
            <script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
            <script src="js/helper-plugins.js"></script>
            <script src="control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
            <!--Plugins-->
            <script src="js/bootstrap.js"></script> <!-- UI -->
            <script src="js/waypoints.js"></script>
            <!--Waypoints-->
            <script src="js/init.js"></script>
            <script src="js/city.js"></script>
            <script src="js/sub-category.js"></script>
            <script src="js/search.js"></script>
            <!--Waypoints-->
            <!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]-->
            <script src="style-switcher/js/jquery_cookie.js"></script>
            <script src="style-switcher/js/script.js"></script>

    </body>

</html>