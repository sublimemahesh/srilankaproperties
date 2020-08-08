<?php
include_once 'class/include.php';
$WHO_WE_ARE = new Page(1);
$VISION = new Page(2);
$MISSION = new Page(3);
$VALUES = new Page(4);
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
              ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Customer Feedback || Sri Lanka Properties</title>
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
    <link href="plugins/sweetalert/sweetalert2.all.min.css" rel="stylesheet" type="text/css">
    <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
    <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="feedback-form/style.css" rel="stylesheet" type="text/css" />
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
                            <h1>Customer Feedback</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
        <div class="main" role="main">
            <div id="content" class="content full im-sec">
                <div class="container">
                    <div class="page">
                        <div class="row">
                            <div class="feedback-form-section col-md-8 col-md-offset-2 col-sm-12">
                                <h3 class="contact-mrg">Custom Feedback Form</h3>
                                <div class="row">
                                    <form method="post" id="guestcomment" name="contactform" class="contact-form" action="https://demo1.imithemes.com/html/real-spaces/mail/contact.php">
                                        <div class="col-md-12 margin-15">
                                            <div class="form-group col-md-12">
                                                <input type="text" id="txtFullName" name="txtFullName" class="form-control input-lg" placeholder="Your Name">
                                                <span id="spanFullName"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" name="txtTitle" id="txtTitle" class="form-control" placeholder="Title">
                                                <span id="spanTitle"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="file" name="imageName" id="imageName" class="form-control" placeholder="Your Image">
                                                <span id="spanImageName"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea cols="6" rows="5" name="txtComment" id="txtComment" class="form-control" placeholder="Your Comment" data-error="Write your comment*"></textarea>
                                                <span id="spanComment"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!--                                                        <input type="text" id="captchacode" name="code" class="form-control input-lg" placeholder="Enter Code">-->
                                                <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter code ">
                                                <span id="capspan"></span>
                                            </div>
                                            <div class="form-group col-md-6 refresh-res code-i">
                                                <div style="margin-top: -12px; margin-left: -15px;" class="mrg code-m">
                                                    <?php include("./feedback-form/captchacode-widget.php"); ?>
                                                </div>
                                                <img id="checking" src="feedback-form/img/checking.gif" alt="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-lg btn-block submit-mrg c-form-submit submit submit-left" value="Submit now!">
                                            <input id="btn-comment" name="btn-comment" type="hidden">
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                                <div id="message">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main" role="main">
            <div id="content" class="content full im-sec">
                <div class="container">
                    <div class="agents-listing">
                        <ul>
                            <?php
                            $comments = Comments::activeComments();
                            if (count($comments) > 0) {
                                foreach ($comments as $key => $comment) {
                            ?>
                                    <li class="col-md-12">
                                        <div class="col-md-2">
                                            <a href="" class="agent-featured-image">
                                                <div class="overlay" style="line-height:151px">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <img src="upload/comments/<?= $comment['image_name']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="agent-info">
                                                <h3><a href=""><?= $comment['name']; ?></a></h3>
                                                <p><?= $comment['comment']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="feedback-form">

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
    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script> <!-- FlexSlider -->
    <script src="js/helper-plugins.js"></script> <!-- Plugins -->
    <script src="js/bootstrap.js"></script> <!-- UI -->
    <script src="js/waypoints.js"></script> <!-- Waypoints -->
    <script src="js/init.js"></script> <!-- All Scripts -->
    <!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]-->
    <script src="style-switcher/js/jquery_cookie.js"></script>
    <script src="style-switcher/js/script.js"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <!-- <script src="feedback-form/scripts.js" type="text/javascript"></script> -->
    <script src="js/customer-feedback.js" type="text/javascript"></script>
</body>

</html>