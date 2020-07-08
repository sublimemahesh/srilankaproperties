<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Property
 *
 * @author Suharshana DsW
 */
class Property {

    public $id;
    public $title;
    public $image_name;
    public $short_description;
    public $description;
    public $price;
    public $category;
    public $sub_category;
    public $housetype;
    public $contact;
    public $map;
    public $features;
    public $queue;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `property` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->image_name = $result['image_name'];
            $this->short_description = $result['short_description'];
            $this->description = $result['description'];
            $this->price = $result['price'];
            $this->category = $result['category'];
            $this->sub_category = $result['sub_category'];
            $this->housetype = $result['housetype'];
            $this->contact = $result['contact'];
            $this->map = $result['map'];
            $this->features = $result['features'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `property` ("
                . "`title`,"
                . "`image_name`,"
                . "`short_description`,"
                . "`description`,"
                . "`price`,"
                . "`category`,"
                . "`sub_category`,"
                . "`housetype`,"
                . "`contact`,"
                . "`map`," 
                . "`features`,"
                . "`queue`"
                . ") VALUES  ('"
                . $this->title . "','"
                . $this->image_name . "', '"
                . $this->short_description . "', '"
                . $this->description . "', '"
                . $this->price . "', '"
                . $this->category . "', '"
                . $this->sub_category . "', '"
                . $this->housetype . "', '"
                . $this->contact . "', '"
                . $this->map . "', '"
                . $this->features . "', '"
                . $this->queue . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `property` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllPendingProperties() {

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.status = 0 ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllApprovedProperties() {

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.status = 1 ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPropertysByCategory($category) {

        $query = "SELECT * FROM `property` WHERE `type` = $type ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function approveOrRejectProperty($property,$approvation) {
        
        $query = "UPDATE `property` SET  `status`= $approvation WHERE `id` = $property";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
 
            return TRUE;

        } else {

            return FALSE;
        }

    }

    public function update() {

        $query = "UPDATE  `property` SET "
                . "`title` ='" . $this->title . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`short_description` ='" . $this->short_description . "', "
                . "`description` ='" . $this->description . "', "
                . "`price` ='" . $this->price . "', "
                . "`category` ='" . $this->category . "', "
                . "`sub_category` ='" . $this->sub_category . "', "
                . "`housetype` ='" . $this->housetype . "', "
                . "`contact` ='" . $this->contact . "', "
                . "`map` ='" . $this->map . "', "
//                . "`plan_image` ='" . $this->plan_image . "', "
                . "`features` ='" . $this->features . "', "
                . "`queue` ='" . $this->queue . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $this->deletePhotos();

        unlink(Helper::getSitePath() . "upload/property/" . $this->image_name);

        $query = 'DELETE FROM `property` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos() {

        $PROPERT_PHOTOS = new PropertyPhoto(NULL);

        $allPhotos = $PROPERTY_PHOTOS->getPropertyPhotosById($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $PROPERTY_PHOTOS->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/property/gallery/" . $IMG);
            unlink(Helper::getSitePath() . "upload/property/gallery/thumb/" . $IMG);

            $PROPERTY_PHOTOS->id = $photo["id"];
            $PROPERTY_PHOTOS->delete();
        }
    }

    public function arrange($key, $img) {
        $query = "UPDATE `property` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
