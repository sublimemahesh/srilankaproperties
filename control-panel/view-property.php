<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PROPERTY = new Property($id);
$DISTRICT = new District($PROPERTY->district);
$CITY = new City($PROPERTY->city);
$CATEGORY = new Category($PROPERTY->category);
$SUBCAT = new SubCategory($PROPERTY->sub_category);
$MEMBER = new Member($PROPERTY->member);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Properties</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert2.all.min.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/owl-carousel/css/owl.theme.default.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
    include './navigation-and-header.php';
    ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Manage Brand -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                View Property - #<?= $PROPERTY->id; ?>
                            </h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="manage-property.php?type=<?= $PROPERTY->status; ?>">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <div class="row clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <th>Member</th>
                                                    <td><?= $MEMBER->name; ?></td>
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

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                View Property Photos
                            </h2>
                        </div>
                        <div class="body">
                            <div>
                                <div class="row clearfix">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="owl-carousel">
                                                <?php
                                                $photos = PropertyPhoto::getPropertyPhotosByProperty($id);
                                                if (count($photos) > 0) {
                                                    foreach ($photos as $photo) {
                                                ?>
                                                        <div>
                                                            <img src="../upload/properties/gallery/<?= $photo['image_name']; ?>" />
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <h5>No any photos in the database.</h5>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-back">
                                                <a href="manage-property.php?type=<?= $PROPERTY->status; ?>" class="btn btn-success">Back</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Manage brand -->

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="plugins/owl-carousel/js/owl.carousel.js"></script>
    <script src="js/demo.js"></script>
    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1,
                margin: 10,
                nav: true,
                dots: true,
                responsive: {
                    600: {
                        items: 1,
                        nav: true,
                        dots: true
                    }
                }
            });
        });
    </script>
</body>

</html>