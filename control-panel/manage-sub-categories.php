<?php
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
        <title>Sub Category</title>
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
                                <h2>Create Sub Category - <?= $CATEGORY->name; ?></h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="manage-categories.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/sub-category.php" enctype="multipart/form-data"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="name" class="form-control" autocomplete="off" name="name" required="true">
                                                <label class="form-label">Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"> 
                                        <input type="hidden" name="category" value="<?= $CATEGORY->id; ?>" />
                                         <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="create"/>

                                    </div>
                                </form>
                                <div class="row">
                                </div>
                                <div class="row clearfix">
                                    <hr/>
                                    <div class="heading m-cat">
                                        <p>Manage Sub Categories</p>
                                        <a href="manage-sub-categories.php">
                                        </a>
                                    </div>


                                    <?php
                                    $SUB_CATEGORY = new SubCategory(NULL);
                                    foreach ($SUB_CATEGORY->all() as $key => $sub_category) {
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
<!--                                                    <th>Category ID</th>-->
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Options</th> 
<!--                                                    <th>Category ID</th>-->
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php
                                                foreach ($SUB_CATEGORY->all() as $key => $sub_category) {
                                                    $key++;
                                                    ?>
                                                    <tr id="row_<?php echo $sub_category['id']; ?>">
                                                        <td><?php echo $key; ?></td> 
                                                        <td><?php echo $sub_category['name']; ?></td>
<!--                                                        <td><?php echo $sub_category['category']; ?></td> -->
                                                        <td>  

                                                            <a href="edit-sub-category.php?id=<?php echo $sub_category['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button>
                                                            </a>

                                                            |  

                                                            <a href="#" > 
                                                                <button class="glyphicon glyphicon-trash delete-btn delete-sub-category" data-id="<?php echo $sub_category['id']; ?>"></button>
                                                            </a>

                                                            |

                                                            <a href="arrange-sub-category.php?id="> 
                                                                <button class="glyphicon glyphicon-random arrange-btn"></button>
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
<script src="delete/js/sub-category.js" type="text/javascript"></script>

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