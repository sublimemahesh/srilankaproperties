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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sri Lanka Properties</title>
        <!-- Favicon Icon Css -->
        <link rel="icon" type="../image/png" sizes="32x32" href="image/favicon-32x32.png"> 
        <!-- Animation CSS -->
        <link rel="stylesheet" href="../css/animate.css" type="text/css">  
        <!-- Font Css -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Bootstrap Css --> 
        <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
        <!-- main css --> 
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="css/responsive.css" type="text/css" rel="stylesheet">
        <link href="css/custom.css" type="text/css" rel="stylesheet">
        <link href="../control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
    </head>
    <body class="theme-2">
        <!-- LOADER -->
        <!-- <div id="preloader">
            <div class="loading_wrap">
                <img src="../image/logo.jpg" alt="logo">
            </div>
        </div> -->
    <!-- LOADER -->
    <?php include './header.php'; ?>
    <div class="container">
        <div class="header-bar">
            <i class="fa fa-pencil"></i> : Edit Profile
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="member-form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->name)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" id="name" class="form-control <?= $class; ?>" autocomplete="off" name="name" required="true" value="<?= $MEMBER->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="phone">Phone No <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->phone)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" id="phone" class="form-control <?= $class; ?>" autocomplete="off" name="phone" required="true" value="<?= $MEMBER->phone; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs form-control-label text-right">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->email)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" id="email" class="form-control <?= $class; ?>" autocomplete="off" name="email" required="true" value="<?= $MEMBER->email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->district)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <select class="form-control <?= $class; ?>" type="text" id="district" autocomplete="off" name="district">
                                                    <option value="" class="active light-c"> -- Please Select Your District -- </option>
                                                    <?php
                                                    $DISTRICT = new District(NULL);
                                                    foreach ($DISTRICT->all() as $key => $district) {
                                                        if ($MEMBER->district == $district['id']) {
                                                    ?>
                                                            <option value="<?= $district['id']; ?>" selected=""><?= $district['name']; ?></option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="city">City <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->city)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <select class="form-control <?= $class; ?>" autocomplete="off" type="text" id="city" autocomplete="off" name="city" required="TRUE">
                                                    <option value="" class="active light-c"> -- Please Select Your City -- </option>
                                                    <?php
                                                    $CITY = new City(NULL);
                                                    foreach ($CITY->GetCitiesByDistrict($MEMBER->district) as $city) {
                                                        if ($city['id'] == $MEMBER->city) {
                                                    ?>
                                                            <option value="<?= $city['id'] ?>" selected=""><?= $city['name']; ?> </option>
                                                        <?php } else {
                                                        ?>
                                                            <option value="<?= $city['id'] ?>"><?= $city['name']; ?> </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->address)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" name="address" class="form-control <?= $class; ?>" id="address" value="<?= $MEMBER->address; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="nic">NIC Number <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->nic)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" name="nic" class="form-control <?= $class; ?>" id="nic" value="<?= $MEMBER->nic; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="nic_fr_photo">Profile Picture<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-10 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->picture)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="file" name="image_name" class="form-control <?= $class; ?>" id="image_name">
                                                <input type="hidden" name="image_name_ex" id="image_name_ex" value="<?= $MEMBER->picture; ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <a href="../upload/member/profile/<?= $MEMBER->picture; ?>" target="_blank" class="btn btn-lg btn-info">
                                                    <i class="fa fa-image"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                        <label for="nic_fr_photo">Description<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($MEMBER->description)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <textarea id="description" name="description" class="form-control" rows="5"><?= $MEMBER->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                    </div>
                                    <div class="col-lg-9  col-md-9 col-sm-12 col-xs-12 p-l-0">
                                        <input type="hidden" name="id" id="customer" value="<?= $MEMBER->id; ?>">
                                        <input type="submit" name="update" id="btn-update" class="btn btn-info" value="Update Details" />
                                        <img src="img/loading.gif" id="update-loading" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart_div"></div>
        </div>
    </div>
    <?php include './footer.php'; ?>
    <!-- Jquery js -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Custom css -->
    <script src="../js/custom.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/member.js" type="text/javascript"></script>
    <script src="../control-panel/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "#description",
            // ===========================================
            // INCLUDE THE PLUGIN
            // ===========================================

            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            // ===========================================
            // PUT PLUGIN'S BUTTON on the toolbar
            // ===========================================

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            // ===========================================
            // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
            // ===========================================

            relative_urls: false

        });
    </script>
</body>

</html>