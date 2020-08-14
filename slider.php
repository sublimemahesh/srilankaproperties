<div class="site-showcase">
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
<!--    <div class="column">
        <figure class="fluidratio"></figure>
    </div>-->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <?php if (COUNT(Slider::all())) : ?>
                <?php foreach (Slider::all() as $slide) : ?>
                    <li class=" parallax" style="background-image:url(upload/slider/<?= $slide['image_name'] ?>);" onclick="location.href = '<?= $slide['url'] ?>';"></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <!-- End Hero Slider -->
    <!-- Site Search Module -->
    <div class="site-search-module">
        <div class="container-fluid">
            <div class="site-search-module-inside">
                <form action="search.php" id="search-form">
                    <div class="form-group slider-heading slider-i">
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <input type="text" name="keyword" placeholder="Keyword" class="form-control input-lg" />
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <select name="category" id="category" class="form-control input-lg selectpicker">
                                    <option value="" selected>Select Category</option>
                                    <?php
                                    foreach (Category::all() as $category) :
                                        ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <select name="sub_category" id="sub-category" class="form-control input-lg selectpicker">
                                    <option value="" selected>All Sub Categories</option>
                                    <?php
                                    foreach (SubCategory::all() as $subcategory) :
                                        ?>
                                        <option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <select name="district" id="district" class="form-control input-lg selectpicker">
                                    <option value="" selected>All Districts</option>
                                    <?php
                                    foreach (District::all() as $district) :
                                        ?>
                                        <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <select name="city" id="city" class="form-control input-lg selectpicker">
                                    <option value="" selected>All Cities</option>
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