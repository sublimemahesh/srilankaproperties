<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Advertisement Banner</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
    include './navigation-and-header.php';
    ?>

    <section class="content">
        <div class="container-fluid">
            <?php
            $vali = new Validator();

            $vali->show_message();
            ?>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Manage Advertisement Banner</h2>

                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="post-and-get/ads-slider.php" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="caption" class="form-control" autocomplete="off" name="caption" required="true">
                                            <label class="form-label">Caption</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" id="image" class="form-control" autocomplete="off" name="image" required="true">
                                            <label class="form-label">Banner</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control" name="property" id="property">
                                                <option value=""> --Please Select the Property-- </option>
                                                <?php
                                                $properties = Property::getAllPropertiesByActiveMembers();
                                                if (count($properties) > 0) {
                                                    foreach ($properties as $key => $property) {
                                                ?>
                                                        <option value="<?= $property['id'] ?>">
                                                            <?= '#' . $property['id'] . ' - ' .$property['title'] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="create" />
                                </div>

                            </form>
                            <div class="row">
                            </div>
                            <div class="row clearfix">
                                <hr />
                                <?php
                                $ADVERTISEMENT = Advertisement::all();
                                if (count($ADVERTISEMENT) > 0) {
                                    foreach ($ADVERTISEMENT as $key => $ad) {
                                ?>
                                        <div class="col-md-3" id="div<?= $ad['id']; ?>">
                                            <div class="photo-img-container">
                                                <img src="../upload/advertisement/<?= $ad['image_name']; ?>" class="img-responsive ">
                                            </div>
                                            <div class="img-caption">
                                                <p class="maxlinetitle"><?= $ad['caption']; ?></p>
                                                <div class="d">
                                                    <a href="#" class="delete-ads-slider" data-id="<?= $ad['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn"></button></a>
                                                    <a href="edit-ads-slider.php?id=<?= $ad['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a>
                                                    <a href="arrange-slider.php"> <button class="glyphicon glyphicon-random arrange-btn"></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <b style="padding-left: 15px;">No slides in the database.</b>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- #END# Vertical Layout -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/add-new-ad.js" type="text/javascript"></script>
    <script src="delete/js/ads-slider.js" type="text/javascript"></script>

    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>


    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
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