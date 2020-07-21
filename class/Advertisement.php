<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of advertisement
 *
 * @author 
 */
class Advertisement {

    public $id;
    public $caption;
    public $image_name;
    public $property; 
    public $queue;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `advertisement` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->caption = $result['caption'];
            $this->image_name = $result['image_name'];
            $this->property = $result['property'];
            $this->queue = $result['queue']; 

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `advertisement` (`caption`,`image_name`,`property`,`queue` ) VALUES  ('"
                . $this->caption . "','"
                . $this->image_name . "', '"
                . $this->property . "', '" 
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

        $query = "SELECT * FROM `advertisement` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `advertisement` SET "
                . "`caption` ='" . $this->caption . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`property` ='" . $this->property . "', " 
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

        $query = 'DELETE FROM `advertisement` WHERE id="' . $this->id . '"';
        unlink(Helper::getSitePath() . "upload/advertisement/" . $this->image_name);

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $img) {
        $query = "UPDATE `advertisement` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
