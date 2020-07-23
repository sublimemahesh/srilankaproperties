<!-- Start Header Section -->
<header>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="mobile-container visible-xs">
        <div class="topnav">
            <a href="../"><img src="../images/logo.png" alt="logo" class="active logo-width"></a>
            <div id="myLinks">
                <!--                        <a href="index.php">Dashboard</a>
                                        <a href="add-new-property.php">Add New</a>
                                        <a href="edit-profile.php">Update My Details</a>-->
                <ul class="navbar-nav toggle-mob  dash-line">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Properties
                            <i class="fa fa-angle-down"></i>
<!--                            <i class="fa fa-angle-right"></i>-->
                        </a>
                        <div class="sub-menu dropdown-menu">
                            <ul class="all-menu toggle-submenu">
                                <li><a href="add-new-property.php">Add New</a></li>
                                <li><a href="manage-properties.php?status=0">Manage Pending Properties</a></li>
                                <li><a href="manage-properties.php?status=1">Manage Approved Properties</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage-inquiries.php">My Inquiries</a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Profile
                            <i class="fa fa-angle-down"></i>
<!--                            <i class="fa fa-angle-right"></i>-->
                        </a>
                        <div class="sub-menu dropdown-menu">
                            <ul class="all-menu toggle-submenu">
                                <li><a href="edit-profile.php">Update My Details<i class="fa fa-user icon-mrg"></i></a></li>
                                <li><a href="change-password.php">Change Password <i class="fa fa-key"></i> </a></li>
                                <li><a href="logout.php">Log Out <i class="fa fa-sign-out"></i> </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

    </div>

    <div class="mobile-container hidden-xs">
        <div class="header-btm yellow-bg border-0 logo-header">
            <div class="container logo-all">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg categories_menu navbar-light header-full-mrg logo-line">
                            <a href="../"><img src="../images/logo.png" alt="logo" class="logo-padding logo-mobile logo-i"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>

                            <div class="collapse navbar-collapse justify-content-end header-mrg header-box-i" id="navbarSupportedContent">
                                <ul class="navbar-nav link-mrg header-dash ">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Dashboard</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            My Properties
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <div class="sub-menu dropdown-menu">
                                            <ul class="all-menu">
                                                <li><a href="add-new-property.php">Add New</a></li>
                                                <li><a href="manage-properties.php?status=0">Manage Pending Properties</a></li>
                                                <li><a href="manage-properties.php?status=1">Manage Approved Properties</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="manage-inquiries.php">My Inquiries</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            My Profile
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <div class="sub-menu dropdown-menu">
                                            <ul class="all-menu">
                                                <li><a href="edit-profile.php">Update My Details<i class="fa fa-user"></i></a></li>
                                                <li><a href="change-password.php">Change Password <i class="fa fa-key"></i> </a></li>
                                                <li><a href="logout.php">Log Out <i class="fa fa-sign-out"></i> </a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
</header>
<div class="header-overlay"></div>
<!-- End Header Section -->