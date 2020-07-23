<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$MEMBER = new Member($_SESSION["m_id"]);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Properties || Sri Lanka Properties</title>
    <!-- Favicon Icon Css -->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="../css/animate.css" type="text/css">
    <!-- Font Css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap Css -->
    <!--        <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- main css -->
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/responsive.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <link href="../control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
</head>

<body class="theme-2">
    <!-- LOADER -->
    <!--        <div id="preloader">
                    <div class="loading_wrap">
                        <img src="../image/logo.jpg" alt="logo">
                    </div>
                </div>-->
    <!-- LOADER -->
    <?php include './header.php'; ?>
    <div class="container">
        <div class="header-bar font-color">
            <i class="fa fa-plus-circle"></i> Add New Property
            <div class="header-bar-icon">
                <a href="manage-properties.php?status=1">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box form-box-inner">
                    <form class="form-horizontal" id="property-form" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="title">Property Title <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control title-input" autocomplete="off" name="title" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="district">Category <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control title-input" type="text" id="category" autocomplete="off" name="category">
                                            <option value="" class="active light-c"> -- Please Select Category -- </option>
                                            <?php
                                            $CATEGORY = new Category(NULL);
                                            foreach ($CATEGORY->all() as $key => $category) {
                                            ?>
                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="city">Sub Category <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control title-input" autocomplete="off" type="text" id="sub-category" autocomplete="off" name="sub_category" required="TRUE">
                                            <option value="" class="active light-c"> -- Please Select Sub Category -- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="district">District <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control title-input" type="text" id="district" autocomplete="off" name="district">
                                            <option value="" class="active light-c"> -- Please Select Your District -- </option>
                                            <?php
                                            $DISTRICT = new District(NULL);
                                            foreach ($DISTRICT->all() as $key => $district) {
                                            ?>
                                                <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="city">City <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control title-input" autocomplete="off" type="text" id="city" autocomplete="off" name="city" required="TRUE">
                                            <option value="" class="active light-c"> -- Please Select Your City -- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile">
                                <label for="image">Main Image <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="image" class="form-control title-input" name="image" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control title-input" autocomplete="off" name="address" required="true">
                                        <!--                                            <label class="form-label">Title</label>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile">
                                <label for="email">Email<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email" class="form-control title-input" autocomplete="off" name="email" required="true" value="<?= $MEMBER->email; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="contact">Phone Number<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone-number" class="form-control title-input" autocomplete="off" name="phone_number" required="true" value="<?= $MEMBER->phone; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="price">Price (Rs)<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="price" id="price" class="form-control title-input" autocomplete="off" name="price" required="true">
                                        <img src="img/blue-loader.gif" id="price_loader" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 form-control-label text-right title-mobile text-i">
                                <label for="price">Price ($)</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="price" id="price-dollar" class="form-control title-input" autocomplete="off" name="price_dollar" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="price">No of Bed Rooms</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="no-of-bed-rooms" class="form-control title-input" autocomplete="off" name="no_of_bed_rooms" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="description">Description<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom title-input text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="description" name="description" class="form-control title-input" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="district">Property Photos <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i" title="Upload Property Photos">
                                <div class="row">
                                    <div class="property-images-section col-md-12">
                                        <div class="panel-box form-box-inner">
                                            <!-- <form method="post" id="post-data"> -->
                                            <div class="flipScrollableArea hidden" id="image-list" style="/*! height: 112px; */ /*! width: 100%; */">
                                                <div class="flipScrollableAreaWrap">
                                                    <div class="flipScrollableAreaBody" style="height: 112px;">
                                                        <div class="flipScrollableAreaContent">
                                                            <div class="flipScrollableAreaContent1">
                                                            </div>


                                                            <span class="_uploadloaderbox abc">
                                                                <div class="_m _6a">
                                                                    <a class="_uploadbox" rel="ignore">
                                                                        <div class="_upload">
                                                                            <img src="img/blue-loader.gif" id="img_loader" />
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flipScrollableAreaTrack invisible_elem" style="opacity: 0;">
                                                    <div class="flipScrollableAreaGripper hidden_elem"></div>
                                                </div>
                                            </div>
                                            <div class="flie-list-section">
                                            </div>
                                            <div class="post-img" style="    margin-bottom: -10px;">
                                                <a href="#">
                                                    <label class="custom-file-upload">
                                                        <input type="file" data-toggle="tooltip" data-placement="top" title="Tooltip on top" id="upload_first_image" name="post-image"> <span class="fas fa fa-image"></span>
                                                    </label>
                                                </a>
                                                <input type="hidden" name="upload-post-image" value="upload-post-image">

                                            </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row button-add-property">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 p-l-0">
                                <input type="hidden" name="member" value="<?= $_SESSION['m_id']; ?>" />
                                <input type="submit" name="btn-save" id="btn-save" class="btn btn-info member-btn-mrg" value="Add New Property" />
                                <input type="hidden" name="add-new-property" />
                                <img src="img/loading.gif" id="update-loading" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="chart_div"></div>
    </div>

    <?php include './footer.php'; ?>
    <!-- Jquery js -->
    <script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Custom css -->
    <!-- <script src="js/custom.js" type="text/javascript"></script> -->
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/sub-category.js" type="text/javascript"></script>
    <script src="js/property.js" type="text/javascript"></script>
    <script src="js/upload-photos.js" type="text/javascript"></script>
    <script src="../control-panel/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>
    <script src="js/exchange-currency.js" type="text/javascript"></script>
    <script>
        tinymce.init({
            selector: "#description1",
            // ===========================================
            // INCLUDE THE PLUGIN
            // ===========================================
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            // ===========================================
            // PUT PLUGIN'S BUTTON on the toolbar
            // ===========================================
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            // ===========================================
            // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
            // ===========================================
            relative_urls: false
        });
    </script>
    <script>
        // jQuery(document).ready(function($) {

        //     var currency_input = 1;
        //     var currency_from = "LKR"; // currency codes : http://en.wikipedia.org/wiki/ISO_4217
        //     var currency_to = "USD";

        //     var yql_base_url = "https://query.yahooapis.com/v1/public/yql";
        //     var yql_query = 'select%20*%20from%20yahoo.finance.xchange%20where%20pair%20in%20("' + currency_from + currency_to + '")';
        //     var yql_query_url = yql_base_url + "?q=" + yql_query + "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

        //     var op_data = 0;

        //     $.get(yql_query_url, function(data) {
        //         op_data = data.query.results.rate.Rate;
        //         console.log(op_data);
        //     });

        // });
    </script>
</body>

</html>