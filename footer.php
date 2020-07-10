<footer class="site-footer footer-padd-bottom">
    <div class="container footer-marg-top">
        <div class="row">
            <div class="col-md-4 footer-widget widget">
                <h3 class="widgettitle">About Us</h3>
                <ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus condimentum egestas.</p>
                    <p>Lorem ipsum dolor sit amet,Maecenas quis eget tellus dui Morbi vehicula. Vivamus condimentum egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus condimentum egestas</p>
                </ul>
            </div>
            <div class="col-md-2 footer-widget widget">
                <h3 class="widgettitle">Useful Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="development.php">New Development</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="inquiry.php">Inquiry at</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-widget widget">
                <h3 class="widgettitle">Categories</h3>
                <ul>
                    <?php
                    foreach (Category::all() as $key => $category) :
                        if ($key < 5) {
                            ?>

                            <li><?php echo $category['name']; ?></li>
                            
                            <?php
                        }
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="col-md-3 footer-widget widget">
                <h3 class="widgettitle">Contact Us</h3>

                <div class="widget">

                    <div class="wi-content  info-line">
                        <div class="row">
                            <div class="col-xs-12 infor-details">
                                <ul class="wi-list">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-envelope footer-social-icon"></i>mail@synotec.lk</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-map-marker footer-social-icon"></i>
                                            No 55, Isipathanarama Rd,
                                            <p class="footer-social-icon footer-add">Navinna, Maharagama</p></a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-phone footer-social-icon"></i>+94 70 277 3500</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="copyrights-col-right col-md-12 col-sm-12 footer-social-list">
                                <div>
                                    <div class="row">
                                        <div class="copyrights-col-right f">
                                            <div class="social-icons social-list soci">
                                                <a href="#" target="_blank"><i class="fa fa-facebook-square social-f"></i></a>
                                                <a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a>
                                                <a href="#" target="_blank"><i class="fa fa-pinterest-square"></i></a>
                                                <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<footer class="site-footer-bottom">
    <div class="container">
        <div class="row">
            <div class="copyrights-col-left col-md-6 col-sm-6 ">
                <p>&copy; <?php echo date('Y'); ?>. All rights reserved.</p>
            </div>

            <div class="copyrights-col-right col-md-6 col-sm-6 copy-marg f-design padd res-padd">
                Design By:<a target="_blank" class="copy-link" href="https://www.synotec.lk"> Synotec Holdings (Pvt) Ltd.</a> 
            </div>
        </div>
    </div>
</footer>
<!-- End Site Footer -->
<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
