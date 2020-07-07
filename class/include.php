<?php

include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Validator.php');
include_once(dirname(__FILE__) . '/Service.php');
include_once(dirname(__FILE__) . '/ServicePhoto.php');
include_once(dirname(__FILE__) . '/TourPackage.php');
include_once(dirname(__FILE__) . '/TourDate.php');
include_once(dirname(__FILE__) . '/TourDatePhoto.php');
include_once(dirname(__FILE__) . '/Room.php');
include_once(dirname(__FILE__) . '/RoomPhoto.php');
include_once(dirname(__FILE__) . '/Offer.php');
include_once(dirname(__FILE__) . '/OfferPhoto.php');
include_once(dirname(__FILE__) . '/Attraction.php');
include_once(dirname(__FILE__) . '/AttractionPhoto.php');
include_once(dirname(__FILE__) . '/Property.php');
include_once(dirname(__FILE__) . '/PropertyPhoto.php');
include_once(dirname(__FILE__) . '/PhotoAlbum.php');
include_once(dirname(__FILE__) . '/AlbumPhoto.php');
include_once(dirname(__FILE__) . '/Comments.php');
include_once(dirname(__FILE__) . '/Slider.php');
include_once(dirname(__FILE__) . '/Page.php');
include_once(dirname(__FILE__) . '/Banner.php');
include_once(dirname(__FILE__) . '/Product.php');
include_once(dirname(__FILE__) . '/ProductType.php');
include_once(dirname(__FILE__) . '/TourPackagePhotosNormal.php');
include_once(dirname(__FILE__) . '/TourType.php');
include_once(dirname(__FILE__) . '/Category.php');
include_once(dirname(__FILE__) . '/SubCategory.php');

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
