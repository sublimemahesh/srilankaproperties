<?php
include_once 'class/include.php';

$category1 = '';
$subcategory1 = '';
$page = '';
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setlimit = 12;

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
    <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link href="control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
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
            <div class="parallax page-header" style="background-image:url(images/page-header1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?= $title; ?></h1>
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
                                    if (count($properties) > 0) {
                                        foreach ($properties as $property) :
                                            $CATEGORY = new Category($property['category']);
                                            $SUBCATEGORY = new SubCategory($property['sub_category']);
                                            $DISTRICT = new District($property['district']);
                                            $CITY = new City($property['city']);
                                    ?>
                                            <li class="grid-item type-rent">
                                                <div class="property-block">
                                                    <a href="view-property.php?id=<?= $property['id'] ?>" class="property-featured-image">
                                                        <img src="upload/properties/<?= $property['image_name'] ?>">
                                                        <span class="badges"><?= $CATEGORY->name; ?></span>
                                                    </a>
                                                    <div class="property-info">
                                                        <h4><a href="view-property.php?id=<?= $property['id']; ?>"><?= $property['title']; ?></a></h4>
                                                        <span class="location"><?= $DISTRICT->name; ?> <i class='fa fa-chevron-right'></i> <?= $CITY->name; ?></span>
                                                                    <span class="category"><i class='fa fa-list'></i> <?= $CATEGORY->name; ?> <i class='fa fa-chevron-right'></i> <?= $SUBCATEGORY->name; ?></span>
                                                        <div class="price"><strong>Rs</strong><span><?= number_format($property['price'], 2); ?></span></div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <h5>No any <?= strtolower($title); ?> in the database.</h5>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                            <div class="">
                                <?php Property::showPagination($category1, $subcategory1, $setlimit, $page); ?>
                            </div>
                        </div>
                        <!-- Start Sidebar -->
                        <div class="sidebar right-sidebar col-md-3 serch-dev">
                            <div class="widget sidebar-widget">
                                <h3 class="widgettitle">Search Properties</h3>
                                <div class="full-search-form ">
                                    <form action="search.php" id="search-form">
                                        <select name="category" id="category" class="form-control input-lg selectpicker">
                                            <option value="" selected>Category</option>
                                            <?php
                                            foreach (Category::all() as $cat) :
                                            ?>
                                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select name="sub_category" id="sub-category" class="form-control input-lg selectpicker">
                                            <option value="" selected>Sub Category</option>
                                            <?php
                                            foreach (SubCategory::all() as $subcat) :
                                            ?>
                                                <option value="<?php echo $subcat['id']; ?>"><?php echo $subcat['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select name="district" id="district" class="form-control input-lg selectpicker">
                                            <option value="" selected>District</option>
                                            <?php
                                            foreach (District::all() as $district) :
                                            ?>
                                                <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select name="city" id="city" class="form-control input-lg selectpicker">
                                            <option value="" selected>City</option>
                                            <?php
                                            foreach (City::all() as $city) :
                                            ?>
                                                <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-block" id="btn-search"><i class="fa fa-search"></i> Search</button>
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