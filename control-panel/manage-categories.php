<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
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
                                <h2>Create Category</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-categories.php"> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!--                                <form class="form-horizontal"  method="post" action="post-and-get/category.php" enctype="multipart/form-data"> -->
                                <!--                                    <div class="col-md-12">
                                                                        <div class="form-group form-float">
                                                                            <div class="form-line">
                                                                                <input type="text" id="id" class="form-control" autocomplete="off" name="id" required="true">
                                                                                <label class="form-label">ID</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>-->
                                <!--                                    <div class="col-md-12">
                                                                        <div class="form-group form-float">
                                                                            <div class="form-line">
                                                                                <input type="text" id="name" class="form-control" autocomplete="off" name="name" required="true">
                                                                                <label class="form-label">Name</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                            <label for="image">Image</label>
                                                                        </div>
                                                                    <div class="col-md-12">                                       
                                                                        <div class="form-group form-float">
                                                                            <div class="form-line">
                                                                                <input type="file" id="image" class="form-control" name="image"  required="true">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12"> 
                                                                        <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="create"/>
                                                                    </div>-->
                                <div class="body">
                                    <form class="form-horizontal"  method="post" action="post-and-get/category.php" enctype="multipart/form-data"> 
                                        <div class="row clearfix">

                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="name" class="form-control"  name="name"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image">Image</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" id="image" class="form-control" name="image" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="short_description">Short Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="short_description" class="form-control" autocomplete="off" name="short_description" >
                                                        <label class="form-label">Short Description</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                                <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="create"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                </div>
                                <div class="row clearfix">
                                    <hr/>
                                    <div class="heading m-cat">
                                        <p>Manage Categories</p>
                                        <a href="manage-categories.php">
                                        </a>
                                    </div>


                                    <?php
                                    $CATEGORY = new Category(NULL);
                                    foreach ($CATEGORY->all() as $key => $category) {
                                        ?>

                                        <?php
                                    }
                                    ?>   

                                    <div>
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th> 
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th> 
                                                    <th>Options</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php
                                                foreach ($CATEGORY->all() as $key => $category) {
//                                                    dd($category)

                                                    $key++;
                                                    ?>
                                                    <tr id="row_<?php echo $category['id']; ?>">
                                                        <td><?php echo $key; ?></td> 
                                                        <td><?php echo $category['name']; ?></td> 
                                                        <td>  

                                                            <a href="edit-category.php?id=<?php echo $category['id']; ?>"> 
                                                                <button class="glyphicon glyphicon-pencil edit-btn"  title="Edit Category"></button></a>


                                                            |  

                                                            <a href="#" > 
                                                                <button class="glyphicon glyphicon-trash delete-btn delete-category"  title="Delete Category" data-id="<?php echo $category['id']; ?>"></button>
                                                            </a>

                                                            |

                                                            <a href="arrange-category.php?id="> 
                                                                <button class="glyphicon glyphicon-random arrange-btn"  title="Arrange Category"></button>
                                                            </a>

                                                            |

                                                            <a href="manage-sub-categories.php?id=<?php echo $category['id']; ?>"> 
                                                                <button class=" glyphicon glyphicon-list list-btn"  title="Sub Categories"></button>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Manage brand -->
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
    <script src="delete/js/category.js" type="text/javascript"></script>
    <script src="delete/js/category-photo.js" type="text/javascript"></script>

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