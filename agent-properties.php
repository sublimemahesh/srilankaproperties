<?php
include_once 'class/include.php';

$category1 = '';
$subcategory1 = '';
$agent = '';
$page = '';
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setlimit = 40;

$pagelimit = ($page * $setlimit) - $setlimit;
if (isset($_GET['category'])) {
    $category1 = $_GET['category'];
    $CATEGORY = new Category($category1);
    $properties = Property::getPropertiesByCategoryWithLimit($category1, $pagelimit, $setlimit);
    $title = $CATEGORY->name;
}
if (isset($_GET['subcategory'])) {
    $subcategory1 = $_GET['subcategory'];
    $SUBCATEGORY = new SubCategory($subcategory1);
    $properties = Property::getPropertiesBySubCategoryWithLimit($subcategory1, $pagelimit, $setlimit);
    $title = $SUBCATEGORY->name;
}
if (isset($_GET['agent'])) {
    $agent = $_GET['agent'];
    $MEMBER = new Member($agent);
    $properties = Property::getPropertiesByMemberWithLimit($agent, $pagelimit, $setlimit);
    $title = $MEMBER->name;
}
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
                                <h1>Agents by Properties</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
            </div>

            <div class="main" role="main">
                <div class="main" role="main">
                    <div id="content" class="content full">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-agent">
<!--                                        <div class="counts pull-right"><strong>18</strong><span>Properties</span></div>
                                        <h2 class="page-title">Mia Kennedy</h2>-->
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <img src="../srilankaproperties/images/realstate/a2 (1).png"alt="Mia Kennedy" class="img-thumbnail">
                                                <!--                                            </div>-->

                                                <!--                                             <div class="col-md-3 col-sm-3">-->
                                                <div class="agent-contact-details">
                                                    <p class="agent-d">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>
                                                </div>
                                            </div>

                                            <!--                                        </div>
                                                                                    <div class="row">-->

                                            <div class="col-md-9 col-sm-9">
                                                <div class="tabs">
                                                    <ul class="nav nav-tabs">
<!--                                                        <li class="active"> <a data-toggle="tab" href="#sampletab1" class="tab-padd"> All </a> </li>-->
                                                         <li> <a data-toggle="tab" href="#sampletab1" class="tab-padd"> All </a> </li>
                                                        <li> <a data-toggle="tab" href="#sampletab2" class="tab-padd"> Apartments </a> </li>
                                                        <li> <a data-toggle="tab" href="#sampletab3" class="tab-padd"> Houses </a> </li>
                                                        <li> <a data-toggle="tab" href="#sampletab4" class="tab-padd"> Lands </a> </li>
                                                        <li> <a data-toggle="tab" href="#sampletab5" class="tab-padd"> Commercial Office Spaces </a> </li>
                                                        <li> <a data-toggle="tab" href="#sampletab6" class="tab-padd"> New Projects </a> </li>
                                                        <li> <a data-toggle="tab" href="#sampletab7" class="tab-padd"> Holiday Rentals </a> </li>

                                                    </ul>
                                                    <div class="tab-content">
                                                        <div id="sampletab1" class="tab-pane">
                                                            <div class="row">
                                                                <?php
                                                                foreach (Property::getAllPropertiesByActiveMembers() as $key => $property) :
                                                                    if ($key < 20) :
                                                                        $CATEGORY = new Category($property['category']);
                                                                        $SUBCATEGORY = new SubCategory($property['sub_category']);
                                                                        $DISTRICT = new District($property['district']);
                                                                        $CITY = new City($property['city']);
                                                                        ?>

                                                                        <div class="col-md-4 col-sm-4">
                                                                            <div class="item property-block">
                                                                                <a href="view-property.php?id=<?= $property['id'] ?>" class="property-featured-image">
                                                                                    <img src="upload/properties/<?= $property['image_name'] ?>">
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
                                                        <div id="sampletab2" class="tab-pane">
                                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dapibus at dolor.</p>
                                                        </div>
                                                        <div id="sampletab3" class="tab-pane">
                                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor.</p>
                                                        </div>
                                                        <div id="sampletab4" class="tab-pane active">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor.</p>
                                                        </div>
                                                        <div id="sampletab5" class="tab-pane">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque.</p>
                                                        </div>
                                                        <div id="sampletab6" class="tab-pane">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique dignissim. Donec aliquam velit vitae mi dictum. </p>
                                                        </div>
                                                        <div id="sampletab7" class="tab-pane">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique dignissim. Donec aliquam velit vitae mi dictum. </p>
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