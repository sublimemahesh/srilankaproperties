<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inquiry
 *
 * @author Suharshana DsW
 */
class Inquiry {

    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $property;
    public $message;
    public $code;
    public $created_at;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `inquiry` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->address = $result['address'];
            $this->property = $result['property'];
            $this->message = $result['message'];
            $this->code = $result['code'];
            $this->created_at = $result['created_at'];
            return $this;
        }
    }

    public function create() {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `inquiry` ("
                . "`name,"
                . "`email`,"
                . "`phone`,"
                . "`address`,"
                . "`property`,"
                . "`message`,"
                . "`code`,"
                . "`created_at`,"
                . ") VALUES  ('"
                . $name . "','"
                . $this->email . "','"
                . $this->phone . "','"
                . $this->address . "','"
                . $this->property . "', '"
                . $this->message . "', '"
                . $this->code . "', '"
                . $this->created_at . "', '";


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

        $query = "SELECT * FROM `inquiry` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `inquiry` SET "
                . "`name` ='" . $this->name . "', "
                . "`email` ='" . $this->email . "', "
                . "`phone` ='" . $this->phone . "', "
                . "`address` ='" . $this->address . "', "
                . "`property` ='" . $this->property . "', "
                . "`message` ='" . $this->message . "' "
                . "`code` ='" . $this->code . "' "
                . "`created_at` ='" . $this->created_at . "' "
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

//        $this->deletePhotos();

//        unlink(Helper::getSitePath() . "upload/../" . $this->image_name);

        $query = 'DELETE FROM `inquiry` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

     public function arrange($key, $img) {
        $query = "UPDATE `inquiry` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
