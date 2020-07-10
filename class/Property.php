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
class Property
{

    public $id;
    public $createdAt;
    public $member;
    public $title;
    public $category;
    public $sub_category;
    public $district;
    public $city;
    public $image_name;
    public $short_description;
    public $description;
    public $price;
    public $housetype;
    public $contact;
    public $location;
    public $map;
    public $features;
    public $queue;
    public $status;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `property` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->createdAt = $result['created_at'];
            $this->member = $result['member'];
            $this->title = $result['title'];
            $this->category = $result['category'];
            $this->sub_category = $result['sub_category'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            $this->image_name = $result['image_name'];
            $this->short_description = $result['short_description'];
            $this->description = $result['description'];
            $this->price = $result['price'];
            $this->housetype = $result['housetype'];
            $this->contact = $result['contact'];
            $this->location = $result['location'];
            $this->map = $result['map'];
            $this->features = $result['features'];
            $this->queue = $result['queue'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `property` ("
            . "`created_at`,"
            . "`member`,"
            . "`title`,"
            . "`category`,"
            . "`sub_category`,"
            . "`district`,"
            . "`city`,"
            . "`image_name`,"
            . "`short_description`,"
            . "`description`,"
            . "`price`,"
            . "`housetype`,"
            . "`contact`,"
            . "`location`,"
            . "`map`,"
            . "`features`,"
            . "`queue`"
            . ") VALUES  ('"
            . $createdAt . "','"
            . $this->member . "','"
            . $this->title . "','"
            . $this->category . "', '"
            . $this->sub_category . "', '"
            . $this->district . "', '"
            . $this->city . "', '"
            . $this->image_name . "', '"
            . $this->short_description . "', '"
            . $this->description . "', '"
            . $this->price . "', '"
            . $this->housetype . "', '"
            . $this->contact . "', '"
            . $this->location . "', '"
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

    public function all()
    {

        $query = "SELECT * FROM `property` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllPendingProperties()
    {

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.status = 0 ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllApprovedProperties()
    {

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.status = 1 ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPropertiesByCategory($category)
    {

        $query = "SELECT * FROM `property` WHERE `category` = $category AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) ORDER BY `id` ASC";
        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getPropertiesBySubCategory($subcategory)
    {

        $query = "SELECT * FROM `property` WHERE `sub_category` = $subcategory AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) ORDER BY `id` ASC";
        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }


    public function approveOrRejectProperty($property, $approvation)
    {

        $query = "UPDATE `property` SET  `status`= $approvation WHERE `id` = $property";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    public function update()
    {

        $query = "UPDATE  `property` SET "
            . "`title` ='" . $this->title . "', "
            . "`category` ='" . $this->category . "', "
            . "`sub_category` ='" . $this->sub_category . "', "
            . "`district` ='" . $this->district . "', "
            . "`city` ='" . $this->city . "', "
            . "`image_name` ='" . $this->image_name . "', "
            . "`short_description` ='" . $this->short_description . "', "
            . "`description` ='" . $this->description . "', "
            . "`price` ='" . $this->price . "', "
            . "`housetype` ='" . $this->housetype . "', "
            . "`contact` ='" . $this->contact . "', "
            . "`location` ='" . $this->location . "', "
            . "`map` ='" . $this->map . "', "
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

    public function delete()
    {

        $this->deletePhotos();

        unlink(Helper::getSitePath() . "upload/properties/" . $this->image_name);

        $query = 'DELETE FROM `property` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos()
    {

        $PROPERTY_PHOTOS = new PropertyPhoto(NULL);

        $allPhotos = $PROPERTY_PHOTOS->getPropertyPhotosByProperty($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $PROPERTY_PHOTOS->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/properties/gallery/" . $IMG);
            unlink(Helper::getSitePath() . "upload/properties/gallery/thumb/" . $IMG);

            $PROPERTY_PHOTOS->id = $photo["id"];
            $PROPERTY_PHOTOS->delete();
        }
    }

    public function arrange($key, $img)
    {
        $query = "UPDATE `property` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function getPropertiseByMemberAndStatus($member, $status)
    {

        $query = "SELECT * FROM `property` WHERE `member` = $member AND `status` = $status ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getAllPropertiesByActiveMembers()
    {

        $query = "SELECT * FROM `property` WHERE `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
}
