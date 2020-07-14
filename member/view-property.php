<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$MEMBER = new Member($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PROPERTY = new Property($id);
$DISTRICT = new District($PROPERTY->district);
$CITY = new City($PROPERTY->city);
$CATEGORY = new Category($PROPERTY->category);
$SUBCAT = new SubCategory($PROPERTY->sub_category);
$PROPERTY_PHOTO = PropertyPhoto::getPropertyPhotosByProperty($id);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <title>Property || Sri Lanka Properties</title>
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
            <i class="fa fa-eye"></i> View Property Details - #<?= $PROPERTY->id; ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Property ID</th>
                                    <td><?= '#' . $PROPERTY->id; ?></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td><?= $PROPERTY->createdAt; ?></td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td><?= $PROPERTY->title; ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><?= $CATEGORY->name; ?></td>
                                </tr>
                                <tr>
                                    <th>Sub Category</th>
                                    <td><?= $SUBCAT->name; ?></td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td><?= $DISTRICT->name; ?></td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td><?= $CITY->name; ?></td>
                                </tr>
                                <tr>
                                    <th>House Type</th>
                                    <td><?= $PROPERTY->housetype; ?></td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td><?= $PROPERTY->location; ?></td>
                                </tr>
                                <tr>
                                    <th>Map Code</th>
                                    <td><?= $PROPERTY->map; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td><?= $PROPERTY->contact; ?></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td><?= 'Rs.' . number_format($PROPERTY->price, 2); ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                                        if ($PROPERTY->status == 0) {
                                            echo 'Pending';
                                        } else if ($PROPERTY->status == 1) {
                                            echo 'Approved';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td><?= $PROPERTY->short_description; ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= $PROPERTY->description; ?></td>
                                </tr>
                                <tr>
                                    <th>Features</th>
                                    <td><?= $PROPERTY->features; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-back">
                                <a href="manage-properties.php?status=<?= $PROPERTY->status; ?>" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include './footer.php'; ?>
    <!-- Jquery js -->
    <script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Custom css -->
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/dealer_area.js" type="text/javascript"></script>


</body>
</html>