<?php
include_once 'class/include.php';
$page = '';
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setlimit = 10;

$pagelimit = ($page * $setlimit) - $setlimit;
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
              ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Agents || Sri Lanka Properties</title>
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
                            <h1>Agents</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
        <div class="main" role="main">
            <div id="content" class="content full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="agents-listing">
                                <ul>
                                    <?php
                                    $members = Member::getActiveAgents($pagelimit, $setlimit);
                                    if (count($members) > 0) {
                                        foreach ($members as $member) {
                                            $properties = Property::getPropertiesByMember($member['id']);
                                    ?>
                                            <li class="col-md-12 col-sm-12 a-detail-i">
                                                <div class="col-md-4 col-sm-4 img-padding">
                                                    <a class="">
                                                        <?php
                                                        if (isset($member['picture']) && !empty($member['picture'])) {
                                                        ?>
                                                            <img src="upload/member/profile/<?= $member['picture']; ?>" alt="">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="images/member.jpg" alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="col-md-8 col-sm-8 agent-name upper-padd a-i">
                                                    <div class="agent-info">
                                                        <div class="counts"><strong><?= count($properties); ?></strong><span>Properties</span></div>
                                                        <h3><a class="a-name font-m"><?= $member['name']; ?></a></h3>
                                                        <div class="a-details"><p><?= $member['description']; ?></p></div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h5>No any agents in the database.</h5>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="">
                                <?php Member::showPagination($setlimit, $page); ?>
                            </div>

                        </div>
                        <!-- Start Sidebar -->
                        <div class="sidebar right-sidebar col-md-3">
                            <div class="widget sidebar-widget featured-properties-widget">
                                <h3 class="widgettitle">Featured Properties</h3>
                                <ul class="">
                                    <?php
                                    $properties = Property::getAllPropertiesByLimit($pagelimit, $setlimit);
                                    if (count($properties) > 0) {
                                        foreach ($properties as $key => $property) {
                                            if ($key < count($members)) {
                                                $CATEGORY = new Category($property['category']);
                                                $DISTRICT = new District($property['district']);
                                    ?>
                                                <li class="item property-block"> <a href="view-property.php?id=<?= $property['id']; ?>" class="property-featured-image"> <img src="upload/properties/<?= $property['image_name']; ?>" alt=""> <span class="badges"><?= $CATEGORY->name; ?></span> </a>
                                                    <div class="property-info">
                                                        <h4>
                                                            <a href="view-property.php?id=<?= $property['id']; ?>" title="<?= $property['title'] ?>">
                                                                <?php
                                                                if (strlen($property['title']) > 23) {
                                                                    echo substr($property['title'], 0, 21) . '...';
                                                                } else {
                                                                    echo $property['title'];
                                                                }
                                                                ?>
                                                            </a>
                                                        </h4>
                                                        <span class="location"><?= $DISTRICT->name; ?></span>
                                                        <div class="price"><strong>Rs</strong><span><?= number_format($property['price'], 2); ?></span></div>
                                                    </div>
                                                </li>
                                        <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <h6>No any properties.</h6>
                                    <?php
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
    <script src="js/custom.js" type="text/javascript"></script>
</body>

</html>