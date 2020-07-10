<?php include_once 'class/include.php';

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
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
        <!-- Color Style -->
        <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
        <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="js/chosen/chosen.css" rel="stylesheet" type="text/css"/>
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
            <div class="main" role="main">
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
                                        <a href="#" class="btn btn-sm btn-primary read-more">Read More</a>
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
                                    <li class=" parallax" style="background-image:url(images/realstate/add1.jpg);"></li>
                                    <li class="parallax" style="background-image:url(images/realstate/add3.jpg);"></li>
                                    <li class="parallax" style="background-image:url(images/realstate/add2.jpg);"></li>
                                    <li class="parallax" style="background-image:url(images/realstate/add4.jpg);"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="spacer-40"></div>
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
                                    <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
                                        <?php
                                        foreach (Property::all() as $property) :
                                            $CATEGORY = new Category($property['category']);
                                            $DISTRICT = new District($property ['district']);
                                            ?>

                                            <li class="item property-block">
                                                <a href="#" class="property-featured-image">
                                                    <img src="upload/properties/<?= $property['image_name'] ?>" alt="">
                                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                                    <span class="badges"><?= $CATEGORY->name; ?></span>
                                                </a>
                                                <div class="property-info">
                                                    <h4><a href="#"><?= $property['title']; ?></a></h4>
                                                    <span class="location"><?= $DISTRICT->name; ?></span>
                                                 
                                                    <p><?php echo substr($property['short_description'], 0, 60) . '...'; ?></p>
                                                    <div class="price"><strong>Rs</strong><span><?= number_format($property['price'],2); ?></span></div>
                                                </div>
                                            </li> 
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="spacer-40"></div>
                        <div class="container">
                            <div class="row">
                                <div class="padding-tb45 bottom-blocks">
                                    <div class="container">
                                        <div class="row">
                                            <div class="row testi-row">
                                                <div class="col-md-6 col-sm-12 latest-testimonials column">
                                                    <h3 class="widgettitle client-title">Client Testimonials</h3>
                                                    <ul class="testimonials owl-carousel img-thumbnail testi-padd" id="clients-slider" data-columns="1" data-autoplay="yes" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-mobile="1" data-items-tablet="1">
                                                        <li>
                                                            <p class="testi-content">Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus</p>
                                                            <div class="spacer-40"></div>
                                                            <img src="images/realstate/c1.png" alt="Happy Client" class="testimonial-sender">
                                                            <br><cite><strong>Naduni Gunawardane</strong>
                                                            </cite>
                                                        </li>
                                                        <li>
                                                            <p class="testi-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus</p>
                                                            <div class="spacer-40"></div>
                                                            <img src="images/realstate/c2.png" alt="Happy Client" class="testimonial-sender">
                                                            <br><cite><strong>Nikoki Weerakoon</strong>
                                                            </cite>
                                                        </li>
                                                        <li>
                                                            <p class="testi-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus</p>
                                                            <div class="spacer-40"></div>
                                                            <img src="images/realstate/c3.png" alt="Happy Client" class="testimonial-sender">
                                                            <br><cite><strong>Natasha Perera</strong>
                                                            </cite>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-12 popular-agent column">
                                                    <h3 class="widgettitle">Our Agents</h3>
                                                    <ul class="testimonials owl-carousel  testi-padd i-agent" id="clients-slider" data-columns="1" data-autoplay="yes" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-mobile="1" data-items-tablet="1">
                                                        <li>
                                                            <a href="#p"><img src="images/realstate/add6.jpg" alt="" class=""></a> 
                                                        </li>
                                                        <li>
                                                            <a href="#"><img src="images/realstate/add7.jpg" alt="" class=""></a> 
                                                        </li>
                                                        <li>
                                                            <a href="#"><img src="images/realstate/add8.jpg" alt="" class=""></a> 
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Sidebar -->
                                </div>
                            </div>
                            <div class="spacer-40"></div>
                            <div class="container partners">
                                <div class="block-heading">
                                    <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Our Partners</h4>
                                </div>
                                <div class="row">
                                    <ul class="owl-carousel partners-padd" id="clients-slider" data-columns="6" data-autoplay="yes" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="6" data-items-desktop-small="4" data-items-mobile="2" data-items-tablet="4">
                                        <li class="item"> <a href="#"><img src="images/partner-1.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-2.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-3.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-4.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-5.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-1.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-2.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-3.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-4.png" alt=""></a> </li>
                                        <li class="item"> <a href="#"><img src="images/partner-5.png" alt=""></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                    <select name="search" class=" chosen-select" data-placeholder="Choose a country..." multiple  >
                  <option selected>Location</option>
                  <option selected>Colombo</option>
                  <option>Maharagama</option>
              </select>-->

                <!-- Start Site Footer -->
                <?php include './footer.php'; ?>
                <!-- End Site Footer -->
                <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

            </div>
            <script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
            <script src="plugins/prettyphoto/js/prettyphoto.js"></script><!--PrettyPhoto Plugin -->  
            <script src="plugins/owl-carousel/js/owl.carousel.min.js"></script>
            <script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
            <script src="js/helper-plugins.js"></script> <!--Plugins--> 
            <script src="js/bootstrap.js"></script> <!-- UI --> 
            <script src="js/chosen/chosen.js" type="text/javascript"></script>
            <script src="js/waypoints.js"></script>    <!--Waypoints-->            
            <script src="js/init.js"></script>   <!--Waypoints-->  
            <!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]--> 
            <script src="style-switcher/js/jquery_cookie.js"></script> 
            <script src="style-switcher/js/script.js"></script> 

            <script> $(".chosen-select").chosen()</script>
    </body>
</html>