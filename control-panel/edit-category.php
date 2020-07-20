<?php
//
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$CATEGORY = new Category($id);
?> 

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Category</title>
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
                                <h2>
                                    Edit Category
                                </h2>
                            </div>
                            <!--                            <div class="body">
                                                            <form class="form-horizontal" method="post" action="post-and-get/category.php" enctype="multipart/form-data"> 
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" id="name" class="form-control"  value="<?php echo $CATEGORY->name; ?>"  name="name"  required="TRUE">
                                                                            <label class="form-label">Name</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12"> 
                                                                    <input type="hidden" name="id" value="<?= $CATEGORY->id; ?>" />
                                                                    <input type="submit" name="update" class="btn btn-primary m-t-15 waves-effect" value="save"/>
                                                                </div>
                                                                <div class="row clearfix">  </div>
                                                            </form>
                                                        </div>-->
                            <!--                            <div class="body row">
                                                            <form class="form-horizontal" method="post" action="post-and-get/category.php" enctype="multipart/form-data"> 
                            
                                                                <div class="row clearfix">
                            
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="title">Name</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="title" class="form-control"  value="<?php echo $CATEGORY->name; ?>"  name="title"  required="TRUE">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                            
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="image">Image</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="file" id="image" class="form-control" value="<?php echo $CATEGORY->image_name; ?>"  name="image">
                                                                                <img src="../upload/category/<?php echo $CATEGORY->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="description">Short Description</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea id="short_description" name="short_description" class="form-control" rows="5"><?php echo $CATEGORY->short_description; ?></textarea> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                            
                            
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            
                                                                        <input type="hidden" id="oldImageName" value="<?php echo $CATEGORY->image_name; ?>" name="oldImageName"/>
                                                                        <input type="hidden" id="id" value="<?php echo $CATEGORY->id; ?>" name="id"/>
                                                                        <input type="hidden" id="authToken" value="<?php echo $_SESSION["authToken"]; ?>" name="authToken"/>
                                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                                                    </div>
                                                                </div>
                            
                            
                                                            </form>
                                                        </div>-->
                            <div class="body row">
                                <form class="form-horizontal" method="post" action="post-and-get/category.php" enctype="multipart/form-data"> 

                                    <div class="row clearfix">

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control"  value="<?php echo $CATEGORY->name; ?>"  name="name"  required="TRUE">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="image">Image</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="image" class="form-control" value="<?php echo $CATEGORY->image_name; ?>"  name="image">
                                                    <img src="../upload/category/<?php echo $CATEGORY->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="short_description">Short Description</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                <input type="text" id="short_description" class="form-control" value="<?php echo $CATEGORY->short_description; ?>"  autocomplete="off" name="short_description" >
                                                <label class="form-label">Short Description</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                            <input type="hidden" id="oldImageName" value="<?php echo $CATEGORY->image_name; ?>" name="oldImageName"/>
                                            <input type="hidden" id="id" value="<?php echo $CATEGORY->id; ?>" name="id"/>
<!--                                            <input type="hidden" id="authToken" value="<?php echo $_SESSION["authToken"]; ?>" name="authToken"/>-->
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
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


        </script>
    </body>

</html>