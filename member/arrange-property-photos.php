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
            <i class="fa fa-list"></i> Arrange Property Photos - #<?= $id; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" class="form-horizontal" id="arrange-property-photo-form">
                    <div class="panel-box form-box-inner">
                        <div class="row clearfix">
                            <ul id="sortable">
                                <?php
                                if (count($photos) > 0) {
                                    foreach ($photos as $key => $img) {
                                ?>
                                        <div class="col-md-3" style="list-style: none;">
                                            <li class="ui-state-default">
                                                <span class="number-class">(<?= $key + 1; ?>)</span>
                                                <img class="img-responsive" src="../upload/properties/gallery/thumb/<?= $img["image_name"]; ?>" alt="" />
                                                <input type="hidden" name="sort[]" value="<?= $img["id"]; ?>" class="sort-input" />

                                            </li>
                                        </div>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <b style="padding-left: 15px;">No Property Photos in the database.</b>
                                <?php } ?>
                            </ul>
                            <div class="row">
                                <div class="col-sm-12 text-center" style="margin-top: 19px;">
                                    <input type="submit" class="btn btn-info" id="btn-arrange" value="Arrange Photos" name="save-data">
                                    <input type="hidden" name="arrange-property-photos" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    <script src="../control-panel/plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
    <script>
        $(function() {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        });
    </script>
</body>

</html>