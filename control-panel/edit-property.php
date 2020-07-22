<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PROPERTY = new Property($id);
?> 

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit Property</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
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
                                <h2>
                                    Edit Property
                                </h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-property.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" method="post" action="post-and-get/property.php" enctype="multipart/form-data"> 


                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="title" class="form-control"  value="<?php echo $PROPERTY->title; ?>"  name="title"  required="TRUE">
                                                <label class="form-label">Title</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control" name="category" id="category"> 
                                                    <option value=""> --Please Select the Category-- </option>
                                                    <?php
                                                    $CATEGORY = new Category(NULL);
                                                    foreach ($CATEGORY->all() as $key => $category) {
                                                        if ($PROPERTY->category == $category['id']) {
                                                            ?>
                                                            <option value="<?php echo $category['id'] ?>" selected="TRUE">
                                                                <?php echo $category['name'] ?>
                                                            </option>
                                                            <?php
                                                        } else {
                                                            ?> 
                                                            <option value="<?php echo $category['id'] ?>">
                                                                <?php echo $category['name'] ?>
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
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control" name="sub_category" id="sub_category">
                                                    <option value=""> --Please Select the Sub Category-- </option> 
                                                    <?php
                                                    $SUB_CATEGORY = new SubCategory(NULL);
                                                    foreach ($SUB_CATEGORY->all() as $key => $sub_category) {
                                                        if ($PROPERTY->sub_category == $sub_category['id']) {
                                                            ?>
                                                            <option value="<?php echo $sub_category['id'] ?>" selected="TRUE">
                                                                <?php echo $sub_category['name'] ?>
                                                            </option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $sub_category['id'] ?>">
                                                                <?php echo $sub_category['name'] ?>
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
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="housetype" class="form-control"  value="<?php echo $PROPERTY->housetype; ?>" autocomplete="off" name="housetype" required="true">
                                                <label class="form-label">House Type</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                       
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="file" id="image" class="form-control" value="<?php echo $PROPERTY->image_name; ?>"  name="image">
                                                <img src="../upload/property/<?php echo $PROPERTY->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="short_description" class="form-control" value="<?php echo $PROPERTY->short_description; ?>"  name="short_description">
                                                <label class="form-label">Location</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="map" class="form-control" value="<?php echo $PROPERTY->map; ?>" autocomplete="off" name="map" required="true">
                                                <label class="form-label">Map Code</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                       
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="file" id="planimage" value="<?php echo $PROPERTY->plan_image; ?>" class="form-control" name="planimage">
                                                <img src="../upload/property/plan/<?php echo $PROPERTY->plan_image; ?>" id="planimage" class="view-edit-img img img-responsive img-thumbnail" name="planimage" alt="old image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="contact" class="form-control" autocomplete="off" value="<?php echo $PROPERTY->contact; ?>"name="contact" required="true">
                                                <label class="form-label">Contact</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="price" class="form-control"  value="<?php echo $PROPERTY->price; ?>"  name="price"  required="TRUE">
                                                <label class="form-label">Price</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="features">Features</label>
                                        <div class="form-line">
                                            <textarea id="features" name="features" class="form-control" rows="5"><?php echo $PROPERTY->features; ?></textarea> 
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="description">Description</label>
                                        <div class="form-line">
                                            <textarea id="description" name="description" class="form-control" rows="5"><?php echo $PROPERTY->description; ?></textarea> 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="oldImageName" value="<?php echo $PROPERTY->image_name; ?>" name="oldImageName"/>
                                        <input type="hidden" id="oldPlanImageName" value="<?php echo $PROPERTY->plan_image; ?>" name="oldPlanImageName"/>
                                        <input type="hidden" id="id" value="<?php echo $PROPERTY->id; ?>" name="id"/>
<!--                                            <input type="hidden" id="authToken" value="<?php echo $_SESSION["authToken"]; ?>" name="authToken"/>-->
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                    </div>
                                    <div class="row clearfix">  </div>
                                    <hr/>
                                </form>
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
            tinymce.init({
                selector: "#features",
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