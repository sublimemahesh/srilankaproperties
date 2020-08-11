<?php
include_once 'class/include.php';
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $PROPERTY = new Property($id);
    $photos = PropertyPhoto::getPropertyPhotosByProperty($id);
    $CATEGORY1 = new Category($PROPERTY->category);
    $SUBCATEGORY1 = new SubCategory($PROPERTY->sub_category);
    $DISTRICT1 = new District($PROPERTY->district);
    $CITY1 = new City($PROPERTY->city);
    $MEMBER = new Member($PROPERTY->member);
}
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
                      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?= $PROPERTY->title; ?> || Properties || Sri Lanka Properties</title>
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
            <div class="spacer-40"></div>
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-xs-12">
                                <div class="single-property">
                                    <?php
                                    if (count($photos) > 0) {
                                    ?>
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
                                    <?php
                                    } else {
                                    ?>

                                        <!-- <div style="height: 20px;"></div> -->
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="">
                                    <div class="property-details-section widget">
                                        <h3 class="widgettitle">Property Details</h3>
                                    </div>
                                    <div class="tab-content">
                                        <div id="description" class="tab-pane active">
                                            <div class="price price-mrg pricing-m"><strong>Rs.</strong><span><?= number_format($PROPERTY->price, 2); ?></span></div>
                                            <?php
                                            if ($PROPERTY->price_dollar != 0.00) {
                                            ?>
                                                <div class="price price-mrg pricing-m"><strong>$</strong><span><?= number_format($PROPERTY->price_dollar, 2) ?></span></div>
                                            <?php
                                            }
                                            ?>
                                            <!-- <div class="property-contact-details">
                                                <div class="contact-info-blocks">
                                                    <div class="view-p-list">
                                                        <i class="fa fa-phone"></i> Phone
                                                        <span><?= $PROPERTY->contact; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-envelope"></i> Email
                                                        <span><?= $PROPERTY->email; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-map-marker"></i> Address
                                                        <span><?= $PROPERTY->address; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-map-marker"></i> District
                                                        <span><?= $DISTRICT1->name; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-map-marker"></i> City
                                                        <span><?= $CITY1->name; ?></span>
                                                    </div>

                                                </div>
                                                <div class="contact-info-blocks">
                                                    <div class="view-p-list">
                                                        <i class="fa fa-star"></i> Category
                                                        <span><?= $CATEGORY1->name; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-star-half-empty"></i> Sub Category
                                                        <span><?= $SUBCATEGORY1->name; ?></span>
                                                    </div>

                                                    <?php
                                                    if ($PROPERTY->no_of_bed_rooms != 0) {
                                                    ?>

                                                        <div>
                                                            <i class="fa fa-bed"></i> Bed Rooms
                                                            <span><?= $PROPERTY->no_of_bed_rooms; ?></span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div> -->
                                            <div class="row property-details-table hidden-xs">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="agent-contact-details">
                                                        <!-- <h4>Contact Details</h4> -->
                                                        <ul class="list-group">
                                                            <li class="list-group-item"> <span class="badge"><?= $CATEGORY1->name; ?></span> Category </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $PROPERTY->contact; ?></span> Phone </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $DISTRICT1->name; ?></span> District </li>
                                                            <?php
                                                            if ($PROPERTY->address != '') {
                                                            ?>
                                                                <li class="list-group-item"> <span class="badge"><?= $PROPERTY->address; ?></span> Address </li>
                                                            <?php
                                                            } elseif ($PROPERTY->no_of_bed_rooms != 0) {
                                                            ?>
                                                                <li class="list-group-item"> <span class="badge"><?= $PROPERTY->no_of_bed_rooms; ?></span> No of Bed Rooms </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="agent-contact-details">
                                                        <!-- <h4 >Property Details</h4> -->
                                                        <ul class="list-group">
                                                            <li class="list-group-item"> <span class="badge"><?= $SUBCATEGORY1->name; ?></span> Sub Category </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $PROPERTY->email; ?></span> Email </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $CITY1->name; ?></span> City </li>
                                                            <?php
                                                            if ($PROPERTY->address != '' && $PROPERTY->no_of_bed_rooms != 0) {
                                                            ?>
                                                                <li class="list-group-item"> <span class="badge"><?= $PROPERTY->no_of_bed_rooms; ?></span> No of Bed Rooms </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row property-details-table visible-xs">
                                                <div class="col-xs-12">
                                                    <div class="agent-contact-details">
                                                        <!-- <h4>Contact Details</h4> -->
                                                        <ul class="list-group">
                                                            <li class="list-group-item"> <span class="badge"><?= $CATEGORY1->name; ?></span> Category </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $SUBCATEGORY1->name; ?></span> Sub Category </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $PROPERTY->contact; ?></span> Phone </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $PROPERTY->email; ?></span> Email </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $DISTRICT1->name; ?></span> District </li>
                                                            <li class="list-group-item"> <span class="badge"><?= $CITY1->name; ?></span> City </li>
                                                            <?php
                                                            if ($PROPERTY->address != 0) {
                                                            ?>
                                                                <li class="list-group-item"> <span class="badge"><?= $PROPERTY->address; ?></span> Address </li>
                                                            <?php
                                                            }
                                                            if ($PROPERTY->no_of_bed_rooms != 0) {
                                                            ?>
                                                                <li class="list-group-item"> <span class="badge"><?= $PROPERTY->no_of_bed_rooms; ?></span> No of Bed Rooms </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="agent-contact-details">
                                                        <!-- <h4 >Property Details</h4> -->
                                                        <ul class="list-group">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><?= $PROPERTY->description; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="inquiry.php?id=<?= $PROPERTY->id; ?>" class="btn btn-primary btn-inquiry-now"> Inquiry Now</a>
                                </div>
                                <?php
                                if ($MEMBER->type == 'agent') {
                                ?>
                                    <div class="widget agent-widget sidebar-widget featured-properties-widget">
                                        <h3 class="widgettitle">Agents</h3>
                                        <div class="agent a-mar">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <img src="upload/member/profile/<?= $MEMBER->picture; ?>" alt="<?= $MEMBER->name; ?>">
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                    <h3><a href="agent-properties.php?agent=<?= $MEMBER->id; ?>" class="a-name font-m"><?= $MEMBER->name; ?></a></h3>
                                                    <?= $MEMBER->description; ?>
                                                    <div class="agent-contacts clearfix">
                                                        <!-- <a href="#" class="btn btn-primary pull-right btn-sm">Contact Agent</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="widget sidebar-widget featured-properties-widget">
                                    <h3 class="widgettitle">Related Properties</h3>
                                    <div class="property-grid">
                                        <div class="row">
                                            <?php
                                            $properties = Property::getPropertiesByCategory($PROPERTY->category);
                                            if (count($properties) - 1 > 0) {
                                            ?>
                                                <ul class="r-img owl-carousel owl-alt-controls" data-columns="3" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
                                                    <?php
                                                    foreach ($properties as $property) :
                                                        if ($property['id'] != $PROPERTY->id) :
                                                            $CATEGORY = new Category($property['category']);
                                                            $SUBCATEGORY = new SubCategory($property['sub_category']);
                                                            $DISTRICT = new District($property['district']);
                                                            $CITY = new City($property['city']);
                                                    ?>
                                                            <li class="item property-block">
                                                                <a href="view-property.php?id=<?= $property['id']; ?>" class="property-featured-image1">
                                                                    <img src="upload/properties/<?= $property['image_name'] ?>" alt="">

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
                                                                            if (strlen($property['title']) > 23) {
                                                                                echo substr($property['title'], 0, 21) . '...';
                                                                            } else {
                                                                                echo $property['title'];
                                                                            }
                                                                            ?>
                                                                        </a>
                                                                    </h4>
                                                                    <span class="location"><?= $DISTRICT->name; ?> <i class='fa fa-chevron-right'></i> <?= $CITY->name; ?></span>
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
                                                            </li>

                                                    <?php
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </ul>
                                            <?php
                                            } else {
                                            ?>
                                                <h5 class="no-p no-p-i">No any related properties in the database.</h5>
                                            <?php }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar right-sidebar col-md-3 col-sm-6 col-xs-12 serch-dev search">
                                <div class="widget sidebar-widget">
                                    <h3 class="widgettitle search-under">Search Properties</h3>
                                    <div class="full-search-form ">
                                        <form action="search.php" id="search-form">
                                            <input type="text" name="keyword" placeholder="Keyword" class="form-control input-lg" />
                                            <select name="category" id="category" class="form-control input-lg selectpicker">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                foreach (Category::all() as $category) :
                                                    $selected = '';
                                                    if ($category['id'] == $PROPERTY->category) :
                                                        $selected = 'selected';
                                                    endif;
                                                ?>
                                                    <option value="<?php echo $category['id']; ?>" <?= $selected; ?>><?php echo $category['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <select name="sub_category" id="sub-category" class="form-control input-lg selectpicker">
                                                <option value="" selected>All Sub Categories</option>
                                                <?php
                                                foreach (SubCategory::getSubCategoriesByCategory($PROPERTY->category) as $subcategory) :
                                                    $selected = '';
                                                    if ($category['id'] == $PROPERTY->sub_category) :
                                                        $selected = 'selected';
                                                    endif;
                                                ?>
                                                    <option value="<?php echo $subcategory['id']; ?>" <?= $selected; ?>><?php echo $subcategory['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <select name="district" id="district" class="form-control input-lg selectpicker">
                                                <option value="" selected>All Districts</option>
                                                <?php
                                                foreach (District::all() as $PROPERTY->district) :
                                                    $selected = '';
                                                    if ($category['id'] == $cat) :
                                                        $selected = 'selected';
                                                    endif;
                                                ?>
                                                    <option value="<?php echo $district['id']; ?>" <?= $selected; ?>><?php echo $district['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <select name="city" id="city" class="form-control input-lg selectpicker">
                                                <option value="" selected>All Cities</option>
                                                <?php
                                                foreach (City::GetCitiesByDistrict($PROPERTY->city) as $PROPERTY->city) :
                                                    $selected = '';
                                                    if ($category['id'] == $cat) :
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
        <script src="style-switcher/js/jquery_cookie.js"></script>
        <script src="style-switcher/js/script.js"></script>
</body>

</html>