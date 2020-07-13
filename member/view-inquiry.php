<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';

$MEMBER = new Member($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$INQUIRY = new Inquiry($id);
$PROPERTY = new Property($INQUIRY->property);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Inquiry || Sri Lanka Properties</title>

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
            <i class="fa fa-eye"></i> View Inquiry Details - #<?= $INQUIRY->id; ?>
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
                                    <th>Property Title</th>
                                    <td><?= $PROPERTY->title; ?></td>
                                </tr>
                                <tr>
                                    <th>Inquiry Date</th>
                                    <td><?= $INQUIRY->created_at; ?></td>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td><?= $INQUIRY->name; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td><?= $INQUIRY->phone; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $INQUIRY->email; ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?= $INQUIRY->address; ?></td>
                                </tr>
                                <tr>
                                    <th>message</th>
                                    <td><?= $INQUIRY->message; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-back">
                                <a href="manage-inquiries.php" class="btn btn-success">Back</a>
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

</body>

</html>