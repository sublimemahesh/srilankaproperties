<?php


include_once(dirname(__FILE__) . '/Advertisement.php');
include_once(dirname(__FILE__) . '/Banner.php');
include_once(dirname(__FILE__) . '/Category.php');
include_once(dirname(__FILE__) . '/City.php');
include_once(dirname(__FILE__) . '/Comments.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/District.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Inquiry.php');
include_once(dirname(__FILE__) . '/Member.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Page.php');
include_once(dirname(__FILE__) . '/Property.php');
include_once(dirname(__FILE__) . '/PropertyPhoto.php');
include_once(dirname(__FILE__) . '/Service.php');
include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Slider.php');
include_once(dirname(__FILE__) . '/SubCategory.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Validator.php');

function dd($data) {
    var_dump($data);
    exit();
}
function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
    exit();
}
