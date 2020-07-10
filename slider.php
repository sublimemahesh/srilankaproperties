<div class="site-showcase">
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <li class=" parallax" style="background-image:url(images/realstate/slider6.jpg);"></li>
            <li class="parallax" style="background-image:url(images/realstate/slider5.jpg);"></li>
            <li class="parallax" style="background-image:url(images/realstate/slider33.jpg);"></li>
        </ul>
    </div>
    <!-- End Hero Slider --> 
    <!-- Site Search Module -->
    <div class="site-search-module">
        <div class="container">
            <div class="site-search-module-inside">
                <form action="#">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="propery type" class="form-control input-lg selectpicker">
                                    <option selected>Property Type</option>
                                    <?php
                                    foreach (Property::all() as $property) :
                                        ?>
                                        <option><?php echo $property['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="propery location" class="form-control input-lg selectpicker">
                                    <option selected>District</option>
                                    <?php
                                    foreach (District::all() as $district) :
                                        ?>
                                        <option><?php echo $district['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="propery location" class="form-control input-lg selectpicker">
                                    <option selected>City</option>
                                    <?php
                                    foreach (City::all() as $city) :
                                        ?>
                                        <option><?php echo $city['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3"> <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search"></i> Search</button> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
