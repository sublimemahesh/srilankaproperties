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
                <form action="search.php" id="search-form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1 ">
                                <select name="category" id="category" class="form-control input-lg selectpicker">
                                    <option value="" selected>Category</option>
                                    <?php
                                    foreach (Category::all() as $category) :
                                        ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="sub_category" id="sub-category" class="form-control input-lg selectpicker">
                                    <option value="" selected>Sub Category</option>
                                    <?php
                                    foreach (SubCategory::all() as $subcategory) :
                                        ?>
                                        <option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="district" id="district" class="form-control input-lg selectpicker">
                                    <option value="" selected>District</option>
                                    <?php
                                    foreach (District::all() as $district) :
                                        ?>
                                        <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="city" id="city" class="form-control input-lg selectpicker">
                                    <option value="" selected>City</option>
                                    <?php
                                    foreach (City::all() as $city) :
                                        ?>
                                        <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2"> <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn-search"><i class="fa fa-search"></i> Search</button> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
