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

    <title>Inquiries || Sri Lanka Properties</title>

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
            <i class="fa fa-link"></i>  Manage Property Inquiries
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover data_table dataTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Property</th>
                                <th>Customer Name</th>
                                <th>Phone No.</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $inquiries = Inquiry::getInquiriesByMember($MEMBER->id);
                            if (count($inquiries) > 0) {
                                foreach ($inquiries as $key => $inquiry) {
                                    $key++;
                                    $PROPERTY = new Property($inquiry['property']);
                            ?>
                                    <tr id="row_<?php echo $inquiry['id']; ?>">
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $inquiry['created_at']; ?></td>
                                        <td><?php echo '#' . $PROPERTY->id . ' - ' . $PROPERTY->title; ?> </td>
                                        <td><?php echo $inquiry['name']; ?> </td>
                                        <td><?php echo $inquiry['phone']; ?> </td>
                                        <td class="text-center">
                                            <a href="view-inquiry.php?id=<?= $inquiry['id']; ?>" class="edit-property btn btn-sm btn-warning" title="View Inquiry Details" data-id=""> <i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No any inquiries.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Property</th>
                                <th>Customer Name</th>
                                <th>Phone No.</th>
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
    <script src="js/email-verification.js" type="text/javascript"></script>


</body>

</html>