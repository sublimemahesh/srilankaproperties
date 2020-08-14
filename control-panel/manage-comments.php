<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$title = '';
if (isset($_GET['status'])) {
    $comments = Comments::pendingComments();
    $title = 'Manage Pending Comments';
} else {
    $comments = Comments::all();
    $title = 'Manage Comments';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Comments</title>
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
    include './navigation-and-header.php';
    ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Manage Brand -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?= $title; ?>
                            </h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="create-comment.php">
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!--                                <div class="table-responsive">-->
                            <div>
                                <div class="row clearfix">
                                    <?php
                                    if (count($comments) > 0) {
                                        foreach ($comments as $key => $comment) {
                                    ?>
                                            <div class="col-md-3" id="div<?php echo $comment['id']; ?>">
                                                <div class="photo-img-container">
                                                    <img src="../upload/comments/<?php echo $comment['image_name']; ?>" class="img-responsive img-circle" style="width: 70%;">
                                                </div>
                                                <div class="img-caption">
                                                    <p class="maxlinetitle"><?php echo $comment['name']; ?></p>
                                                    <div class="d">
                                                        <a href="#" class="delete-comment" data-id="<?php echo $comment['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn" title="Delete Comment"></button></a>
                                                        <a href="edit-comment.php?id=<?php echo $comment['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn" title="Edit Comment"></button></a>
                                                        <a href="arrange-comments.php"> <button class="glyphicon glyphicon-random arrange-btn" title="Arrange Comment"></button></a>
                                                        <?php
                                                        if ($comment['is_active'] == 1) {
                                                            echo 'Active';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <b style="padding-left: 15px;">No comments in the database.</b>
                                    <?php } ?>

                                </div>
                            </div>
                            <!--                                </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Manage brand -->

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/demo.js"></script>
    <script src="delete/js/comment.js" type="text/javascript"></script>

</body>

</html>