<?php
include_once(dirname(__FILE__) . '/../class/include.php');
//include './auth.php';
//
//$DEALER = new Dealer($_SESSION["d_id"]);
//$id = '';
//if (isset($_GET['id'])) {
//    $id = $_GET['id'];
//}
//$ORDER = new Order($id);
//$CUSTOMER = new Customer($ORDER->member);
//$DISTRICT = new District($ORDER->district);
//$CITY = new City($ORDER->city);
//$ORDER_PRODUCT = OrderProduct::getOrdersById($id);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Cash on Delivery - Online Shopping Store</title>

        <!-- Favicon Icon Css -->
        <link rel="icon" type="../image/png" sizes="32x32" href="image/favicon-32x32.png"> 
        <!-- Animation CSS -->
        <link rel="stylesheet" href="../css/animate.css" type="text/css">  
        <!-- Font Css -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap Css --> 
        <!--        <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">-->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>

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
                <i class="fa fa-street-view"></i>  View Order - 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-box">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Order ID</th>
<!--                                        <td><?php echo '#' . $ORDER->id; ?></td>-->
                                    </tr>
                                    <tr>
                                        <th>Ordered At</th>
<!--                                        <td><?php echo $ORDER->orderedAt; ?></td>-->
                                    </tr>
                                    <?php
//                                    if ($ORDER->deliveryStatus == 1)
                                        {
                                        ?>
                                        <tr>
<!--                                            <th>Confirmed At</th>-->
<!--                                            <td><?php echo $ORDER->deliveredAt; ?></td>-->
                                        </tr>
                                        <?php
                                    }
//                                    if ($ORDER->deliveryStatus == 2)
                                        {
                                        ?>
                                        <tr>
<!--                                            <th>Confirmed At</th>-->
<!--                                            <td><?php echo $ORDER->deliveredAt; ?></td>-->
                                        </tr>
                                        <tr>
<!--                                            <th>Completed At</th>-->
<!--                                            <td><?php echo $ORDER->completedAt; ?></td>-->
                                        </tr>
                                        <?php
                                    }
//                                    if ($ORDER->status == 0) 
                                        {
                                        ?>
                                        <tr>
                                            <th>Canceled At</th>
<!--                                            <td><?php echo $ORDER->canceledAt; ?></td>-->
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th>Status</th>
<!--                                        <td>
                                            <?php
                                            if ($ORDER->status == 0) {
                                                echo 'Canceled';
                                            } else if ($ORDER->deliveryStatus == 0) {
                                                echo 'Pending';
                                            } else if ($ORDER->deliveryStatus == 1) {
                                                echo 'Confirmed';
                                            } else if ($ORDER->deliveryStatus == 2) {
                                                echo 'Completed';
                                            }
                                            ?>
                                        </td>-->
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
<!--                                        <td><?php echo $CUSTOMER->name; ?></td>-->
                                    </tr>
                                    <tr>
                                        <th>Contact Number</th>
<!--                                        <td><?php echo $ORDER->contactNo1; ?></td>-->
                                    </tr>
                                    <tr>
                                        <th>Additional Contact Number</th>
<!--                                        <td><?php echo $ORDER->contactNo2; ?></td>-->
                                    </tr>
                                    <tr>
                                        <th>Address</th>
<!--                                        <td><?php echo $ORDER->address; ?></td>-->
                                    </tr>
                                    <tr>
                                        <th>District</th>
<!--                                        <td><?php echo $DISTRICT->name; ?></td>-->
                                    </tr>
                                    <tr>
                                        <th>City</th>
<!--                                        <td><?php echo $CITY->name; ?></td>-->
                                    </tr>
                                </table>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div  class="btn-back">
                                    <?php
//                                    if ($ORDER->deliveryStatus == 0) 
//                                        {
//                                        ?>
                                        <a href="#" data-id="<?php echo $ORDER->id; ?>" dealer="<?php echo $DEALER->id; ?>" class="btn btn-success" id="confirm-order">Back</a>
                                        <?php
//                                    } else if ($ORDER->deliveryStatus == 1) {
//                                        ?>
<!--                                        <a href="#" data-id="//<?php echo $ORDER->id; ?>" class="btn btn-success" id="complete-order">Complete Order</a>
                                        <a href="#" data-id="//<?php echo $ORDER->id; ?>" class="btn btn-danger" id="cancle-order">Cancel Order</a>-->
                                        <?php
//                                    }
                                    ?>


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
        <?php
        $DEALER = new Dealer($_SESSION["d_id"]);

        $result = $DEALER->checkEmptyData();
        if ($result != 0) {
            ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    window.location.replace("edit-profile.php?status=complate");
                });
            </script>
            <?php
        }

        $agreement = $DEALER->checkAgreement();

        if ($agreement == 0) {
            ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    window.location.replace("agreement.php?status=complate");
                });
            </script>
            <?php
        }
        ?>  
    </body>
</html>	 