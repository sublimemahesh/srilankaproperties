<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$PROPERTY = [];
$title = "Manage";
if (isset($_GET['type'])) {
    if ($_GET['type'] == 0) {
        $PROPERTY = Property::getAllPendingProperties();
        $title = "Pending";
    } elseif ($_GET['type'] == 1) {
        $PROPERTY = Property::getAllApprovedProperties();
        $title = "Approved";
    }
}


?>
﻿
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Property</title>
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert2.all.min.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
                                <?= $title; ?> Properties
                            </h2>
<!--                            <ul class="header-dropdown">
                                <li>
                                    <a href="create-property.php">
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>
                            </ul>-->
                        </div>
                        <div class="body">
                            <!-- <div class="table-responsive">-->
                            <div>
                                <div class="row clearfix">
                                    <?php if (count($PROPERTY) > 0) : ?>
                                        <div class="table-responsive m-l-20 m-r-20">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Member</th>
                                                        <th>Category</th>
                                                        <th>District</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Member</th>
                                                        <th>Category</th>
                                                        <th>District</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($PROPERTY as $property) : 
                                                        $MEM = New Member($property['member']);
                                                        $DISTRICT = new District($property['district']);
                                                        ?>
                                                        <tr>
                                                            <!-- <td><img src="../upload/property/<?php echo $property['image_name']; ?>" class="img-responsive img-thumbnail" width="100"></td> -->
                                                            <td><?= $property['id']; ?></td>
                                                            <td><?= $property['title']; ?></td>
                                                            <td><?= $MEM->name; ?></td>
                                                            <td><?= $property['category_name']; ?></td>
                                                            <td><?= $DISTRICT->name; ?></td>
                                                            <td>
                                                                <a href="view-property.php?id=<?php echo $property['id']; ?>"> <button class="glyphicon glyphicon-eye-open edit-btn" title="View Property"></button></a>
                                                                <a href="#" class="toggle-approvation" toggler="<?= $property['status']; ?>" data-id="<?php echo $property['id']; ?>"> <button type="button" class="glyphicon glyphicon-check <?= $property['status'] == 0 ? "approvation-btn-warning" : "approvation-btn-success" ?>"  title="<?= $property['status'] == 0 ? "Approve this Property" : "Reject this Property" ?>"> </button> </a>
                                                                <a href="#" class="delete-properties" data-id="<?= $properties['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn" title="Delete this Property"></button></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <b style="padding-left: 15px;">No Properties in the database.</b>
                                    <?php endif ?>

                                </div>
                            </div>
                            <!--</div>-->
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
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="delete/js/properties.js" type="text/javascript"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <script src="js/demo.js"></script>

    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/demo.js"></script>
    <script src="delete/js/property.js" type="text/javascript"></script>
    <script src="js/property-approve.js" type="text/javascript"></script>
</body>

</html>