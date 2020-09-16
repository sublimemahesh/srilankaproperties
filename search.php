<?php
include_once 'class/include.php';

$category1 = '';
$subcategory1 = '';
$district1 = '';
$city1 = '';
$keyword = '';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['category'])) {
    $category1 = $_GET['category'];
}
if (isset($_GET['sub_category'])) {
    $subcategory1 = $_GET['sub_category'];
}
if (isset($_GET['district'])) {
    $district1 = $_GET['district'];
}
if (isset($_GET['city'])) {
    $city1 = $_GET['city'];
}
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setlimit = 40;

$pagelimit = ($page * $setlimit) - $setlimit;

$properties = Property::search($keyword, $category1, $subcategory1, $district1, $city1, $pagelimit, $setlimit);
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
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
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
            <div class="parallax page-header banner-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Properties</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="main" role="main">
            <div id="content" class="content full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 search-page">
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
                                                        <?php
                                                        if ($property['is_boosted'] == 1) {
                                                            ?>
                                                            <span class="boost-ad">
                                                                <i class="fa fa-star"></i></span>
                                                            <?php
                                                        } elseif ($property['no_of_bed_rooms'] != 0) {
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
                                                        <span class="location"><?= $DISTRICT->name; ?> <i class='fa fa-chevron-right'></i> <?= $CITY->name; ?></span>
                                                        <span class="category"><i class='fa fa-list'></i> <?= $CATEGORY->name; ?> <i class='fa fa-chevron-right'></i> <?= $SUBCATEGORY->name; ?></span>
                                                        <div class="price"><strong>Rs</strong><span><?= number_format($property['price'], 2); ?></span></div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <h5>Search result is empty.</h5>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                            <div class="">
                                <?php Property::showPaginationForSearch($keyword, $category1, $subcategory1, $district1, $city1, $setlimit, $page); ?>
                            </div>
                        </div>
                        <!-- Start Sidebar -->
                        <div class="sidebar right-sidebar col-md-3 col-sm-6 serch-dev">
                            <div class="widget sidebar-widget">
                                <h3 class="widgettitle i-ser-un search-under">Search Properties</h3>
                                <div class="full-search-form ">
                                    <form action="search.php" id="search-form">
                                        <input type="text" name="keyword" placeholder="Keyword" class="form-control input-lg" />
                                        <select name="category" id="category" class="form-control input-lg selectpicker">
                                            <option value="" selected>Select Category</option>
                                            <?php
                                            foreach (Category::all() as $category) :
                                                $selected = '';
                                                if ($category['id'] == $category1) :
                                                    $selected = 'selected';
                                                endif;
                                            ?>
                                                <option value="<?php echo $category['id']; ?>" <?= $selected; ?>><?php echo $category['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select name="sub_category" id="sub-category" class="form-control input-lg selectpicker">
                                            <option value="" selected>All Sub Categories</option>
                                            <?php
                                            if($category1 != '') {
                                                $subcategories = SubCategory::getSubCategoriesByCategory($category1);
                                                foreach (SubCategory::getSubCategoriesByCategory($category1) as $subcategory) :
                                                    $selected = '';
                                                    if ($subcategory['id'] == $subcategory1) :
                                                        $selected = 'selected';
                                                    endif;
                                                    ?>
                                                <option value="<?php echo $subcategory['id']; ?>" <?= $selected; ?>><?php echo $subcategory['name']; ?></option>
                                                <?php
                                                endforeach;
                                            } 
                                        
                                         ?>
                                        </select>
                                        <select name="district" id="district" class="form-control input-lg selectpicker">
                                            <option value="" selected>All Districts</option>
                                            <?php
                                            foreach (District::all() as $district) :
                                                $selected = '';
                                                if ($district['id'] == $district1) :
                                                    $selected = 'selected';
                                                endif;
                                            ?>
                                                <option value="<?php echo $district['id']; ?>" <?= $selected; ?>><?php echo $district['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select name="city" id="city" class="form-control input-lg selectpicker">
                                            <option value="" selected>All Cities</option>
                                            <?php
                                            foreach (City::all() as $city) :
                                                $selected = '';
                                                if ($city['id'] == $city1) :
                                                    $selected = 'selected';
                                                endif;
                                            ?>
                                                <option value="<?php echo $city['id']; ?>" <?= $selected; ?>><?php echo $city['name']; ?></option>
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
    <!-- <script src="style-switcher/js/jquery_cookie.js"></script>
        <script src="style-switcher/js/script.js"></script> -->
</body>

</html>