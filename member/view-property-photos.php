<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$MEMBER = new Member($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $PROPERTY = new Property($id);
    $photos = PropertyPhoto::getPropertyPhotosByProperty($id);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Properties || Sri Lanka Properties</title>
    <!-- Favicon Icon Css -->
    <link rel="icon" type="../image/png" sizes="32x32" href="image/favicon-32x32.png">
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
            <i class="fa fa-link"></i> Manage Property Photos - #<?= $id; ?>
            <div class="header-bar-icon">
                <a href="manage-properties.php?status=<?= $PROPERTY->status; ?>">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box form-box-inner">
                    <form class="form-horizontal" id="property-photo-form" method="post" action="" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right">
                                <label for="image">Image <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="image" class="form-control" name="image" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right">
                                <label for="caption">Caption</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="caption" class="form-control" autocomplete="off" name="caption" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right">
                            </div>
                            <div class="col-lg-9  col-md-9 col-sm-9 col-xs-12 p-l-0">
                                <input type="hidden" name="property" value="<?= $id; ?>" />
                                <input type="submit" name="btn-save" id="btn-save" class="btn btn-info" value="Upload Photo" />
                                <input type="hidden" name="add-new-property-image" />
                                <img src="img/loading.gif" id="update-loading" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel-box form-box-inner">
                    <div class="row clearfix">
                        <?php
                        $PHOTO = PropertyPhoto::getPropertyPhotosByProperty($id);
                        if (count($PHOTO) > 0) {
                            foreach ($PHOTO as $key => $photo) {
                        ?>
                                <div class="col-md-3" id="div<?= $photo['id']; ?>">
                                    <div class="photo-img-container">
                                        <img src="../upload/properties/gallery/thumb/<?= $photo['image_name']; ?>" class="img-responsive ">
                                    </div>
                                    <div class="img-caption">
                                        <p class="maxlinetitle"><?= $photo['caption']; ?></p>
                                        <div class="d">
                                            <a href="edit-property-photo.php?id=<?= $photo['id']; ?>" class="btn btn-sm btn-info"> <i class="fa fa-pencil"></i></a>
                                            <a href="arrange-property-photos.php?id=<?= $photo['property']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-random"></i></a>
                                            <a data-id="<?= $photo['id']; ?>" class="delete-property-photo btn btn-sm btn-danger"> <i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <b style="padding-left: 15px;">No Property Photos in the database.</b>
                        <?php } ?>
                    </div>
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
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/sub-category.js" type="text/javascript"></script>
    <script src="js/property-photo.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>
</body>

</html>