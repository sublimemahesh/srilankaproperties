<?php
 session_start();
 ?>
<header class="site-header">
    <div class="top-header h-height hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <ul class="horiz-nav pull-left">

                        <li><a href="http://instagram.com/" target="_blank"><i class="fa fa-instagram header-icon"></i></a></li>
                        <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook header-icon"></i></a></li>
                        <li><a href="http://twitter.com/" target="_blank"><i class="fa fa-twitter header-icon"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-8 col-sm-8 header-i">
                    <ul class="horiz-nav pull-right">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                         <?php
                        
                        if (isset($_SESSION['m_id'])) {
                        ?>
                           <li class="dropdown"><a href="member/">Post Your Ad </a></li>
                        <?php
                        } else {
                        ?>
                            <li class="dropdown"><a href="member/login.php"> Post Your Ad</a></li>
                        <?php
                        }
                        ?>
                            
                        <?php
                       
                        if (isset($_SESSION['m_id'])) {
                        ?>
                            <li class="dropdown"><a href="member/">
                                    <?php
                                    if (isset($_SESSION['m_picture']) && !empty($_SESSION['m_picture'])) {
                                    ?>
                                        <img src="upload/member/profile/<?= $_SESSION['m_picture']; ?>" class="header-profile-pic img-circle">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="images/member.jpg" class="header-profile-pic img-circle">
                                    <?php
                                    }
                                    ?>

                                    My Account </a></li>
                        <?php
                        } else {
                        ?>
                            <li class="dropdown"><a href="member/login.php"><i class="fa fa-user login-icon"></i> Login </a></li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-8 col-xs-8">
                    <h1 class="logo"><a href="index.php"><img src="images/logo.png"alt="Logo"></a></h1>
                </div>
                <div class="col-md-8 col-sm-4 col-xs-4">
                    <div class="contact-info-blocks hidden-sm hidden-xs">
                        <div>
                            <i class="fa fa-phone"></i> Phone
                            <span>+94 11 366 3500</span>
                        </div>
                        <div>
                            <i class="fa fa-envelope"></i> Email
                            <span>mail@synotec.lk</span>
                        </div>
                        <div>
                            <i class="fa fa-clock-o"></i> Working Hours
                            <span>09:00 to 18:00</span>
                        </div>
                    </div>
                    <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navigation">
                        <ul class="sf-menu">
                            <li><a class="header-nav" href="./">Home</a></li>
                            <?php
                            foreach (Category::all() as $category) {
                                $subcategories = SubCategory::getSubCategoriesByCategory($category['id']);
                            ?>
                                <li><a class="header-nav" href="properties.php?category=<?= $category['id']; ?>"><?= $category['name']; ?></a>
                                    <?php
                                    if (count($subcategories) > 0) {
                                    ?>
                                        <ul class="dropdown h-drop header-drop h-drop-i header-drop-i">
                                            <?php
                                            foreach ($subcategories as $subcategory) {
                                            ?>
                                                <li><a href="properties.php?subcategory=<?= $subcategory['id']; ?>"><?= $subcategory['name']; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    <?php
                                    }
                                    ?>
                                </li>
                            <?php
                            }
                            ?>
                                <li><a class="header-nav" href="agents.php">Agents</a></li>
                            <li class="visible-xs"><a class="header-nav" href="about.php">About Us</a></li>
                            <li class="visible-xs"><a class="header-nav" href="contact.php">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>