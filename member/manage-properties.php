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

    <link href="../control-panel/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

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
            <?php
            if ($_GET['status'] == 0) {
            ?>
                <i class="fa fa-link"></i> : Manage Pending Properties
            <?php
            } else {
            ?>
                <i class="fa fa-link"></i> : Manage Approved Properties
            <?php
            }
            ?>


        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover data_table dataTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>District</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $PROPERTIES = new Property(NULL);
                            if ($_GET['status'] == 0) {
                                $propertise = Property::getPropertiseByMemberAndStatus($_SESSION['m_id'], 0);
                            } else {
                                $propertise = Property::getPropertiseByMemberAndStatus($_SESSION['m_id'], 1);
                            }
                            if (count($propertise) > 0) {
                                foreach ($propertise as $key => $property) {
                                    $key++;
                                    $CITY = new City($property['city']);
                                    $DISTRICT = new District($property['district']);
                                    $CAT = new Category($property['category']);
                                    $SUBCAT = new SubCategory($property['sub_category']);
                            ?>
                                    <tr id="row_<?php echo $property['id']; ?>">
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $property['title']; ?></td>
                                        <td><?php echo $CAT->name; ?> </td>
                                        <td><?php echo $SUBCAT->name; ?> </td>
                                        <td><?php echo $DISTRICT->name; ?> </td>
                                        <td class="text-center">
                                            <!-- <div class="edit-area btn btn-sm btn-info" data-id=""> <i class="fa fa-pencil"></i></div> |
                                        <div href="#" class="delete-area btn btn-sm btn-danger" data-id=""> <i class="fa fa-trash"></i></div> -->
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No any properties in the database.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>District</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </tfoot>
                    </table>
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