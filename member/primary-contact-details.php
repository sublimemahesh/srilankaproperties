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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Property || Sri Lanka Properties</title>
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
    <div class="alert alert-danger alert-dismissible" id="alert_verify" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Not Verified!</strong> You must verify your email before continuing.
        </div>
        <div class="header-bar font-color">
            <i class="fa fa-eye"></i> Primary Contact Details - #<?= $MEMBER->id; ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item bcg-color">
                                    <b>Email Address</b>
                                    <span class="align-right btn btn-sm btn-default fa fa-pencil" id="btn_change_email" style="float: right; font-size: 12px; padding: 1px 6px 1px 6px;" title="Change Email"></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Email: <span id="lbl_email"><?php echo $MEMBER->email; ?></span></b>
                                </li>
                                <li class="list-group-item"><b>Status</b>:

                                    <?php
                                    if ($MEMBER->email_verified == '0') {
                                        echo '<b class="text-danger" id="lb_verified_email">Not Verified</b>';
                                    } else {
                                        echo '<b class="text-success" id="lb_verified_email">Verified</b>';
                                    }
                                    ?>

                                </li>
                                <li class="list-group-item" id="email_verification_li" style="display: none;">
                                    <input type="text" id="email_verification_code" placeholder="Enter The Verification Code" class="form-control" style="width: 250px; margin-bottom: 10px;">
                                    <input type="button" id="verify_email" class="btn btn-large btn-success" value="Verify Email Address">
                                </li>
                                <?php
                                if ($MEMBER->email_verified == '0') {
                                ?>
                                    <li class="list-group-item" id="send_email_verification_li">
                                    <?php
                                } else {
                                    ?>
                                    <li class="list-group-item" id="send_email_verification_li" style="display: none;">
                                    <?php
                                }
                                    ?>

                                    <input type="button" id="send_email_verification" class="btn btn-large btn-info" value="Verify The Email Now">
                                    <span id="countdown_e" style="margin-left: 10px;"></span>
                                    <img src="img/blue-loader.gif" style="width: 30px; display: none;" id="send_email_verification_loader" />
                                    </li>
                            </ul>
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
    <script src="js/email-verification.js" type="text/javascript"></script>


</body>

</html>