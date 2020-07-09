<?php

/**
 * Description of Member
 *
 * @author synotec holdings
 * @web www.synotec.lk
 */
class Member
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $nic;
    public $address;
    public $district;
    public $city;
    public $picture;
    public $password;
    private $authToken;
    public $resetcode;
    public function __construct($id)
    {
        if ($id) {
            $query = "SELECT  * FROM `member` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->phone = $result['phone'];
            $this->email = $result['email'];
            $this->nic = $result['nic'];
            $this->address = $result['address'];
            $this->city = $result['city'];
            $this->district = $result['district'];
            $this->picture = $result['picture'];
            $this->password = $result['password'];
            $this->authToken = $result['auth_token'];
            return $this;
        }
    }
    public function create()
    {
        $query = "INSERT INTO `member` ("
            . "`name`, "
            . "`phone`, "
            . "`email`,"
            . "`password`,"
            . "`nic`,"
            . "`address`,"
            . "`district`,"
            . "`city`,"
            . "`picture`"
            . ") VALUES  ('"
            . $this->name . "','"
            . $this->phone . "', '"
            . $this->email . "', '"
            . $this->password . "', '"
            . $this->nic . "', '"
            . $this->address . "', '"
            . $this->district . "', '"
            . $this->city . "', '"
            . $this->picture . "')";
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
        $query = "SELECT * FROM `member` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function login($email, $password)
    {
        $query = "SELECT  * FROM `member` WHERE `email`= '" . $email . "' AND `password`= '" . $password . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            $this->id = $result['id'];
            $this->setAuthToken($result['id']);
            $this->setUserSession($this->id);
            $member = $this->__construct($this->id);
            return $member;
        }
    }
    public function logOut()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["m_id"]);
        unset($_SESSION["m_login"]);
        unset($_SESSION["m_name"]);
        unset($_SESSION["m_email"]);
        return TRUE;
    }
    private function setUserSession($member)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $member = $this->__construct($member);
        $_SESSION["m_login"] = true;
        $_SESSION["m_id"] = $member->id;
        $_SESSION["m_name"] = $member->name;
        $_SESSION["m_email"] = $member->email;
        $_SESSION["m_phone"] = $member->phone;
        $_SESSION["m_authToken"] = $member->authToken;
        $_SESSION["m_picture"] = $member->picture;
    }
    private function setAuthToken($id)
    {
        $authToken = md5(uniqid(rand(), true));
        $query = "UPDATE `member` SET `auth_token` ='" . $authToken . "' WHERE `id`='" . $id . "'";
        $db = new Database();
        if ($db->readQuery($query)) {
            return $authToken;
        } else {
            return FALSE;
        }
    }
    public function authenticate()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = NULL;
        $authToken = NULL;
        if (isset($_SESSION["m_id"])) {
            $id = $_SESSION["m_id"];
        }
        if (isset($_SESSION["m_authToken"])) {
            $authToken = $_SESSION["m_authToken"];
        }
        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "' AND `auth_token`= '" . $authToken . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function checkEmail($id, $email)
    {
        $query = "SELECT `email`,`name` FROM `member` WHERE `email`= '" . $email . "' AND `id` != '" . $id . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }
    public function genarateCode($email)
    {
        $rand = rand(10000, 99999);
        $query = "UPDATE  `member` SET "
            . "`resetcode` ='" . $rand . "' "
            . "WHERE `email` = '" . $email . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function selectForgetMember($email)
    {
        if ($email) {
            $query = "SELECT `email`,`name`,`resetcode` FROM `member` WHERE `email`= '" . $email . "'";
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->restCode = $result['resetcode'];
            return $result;
        }
    }
    public function selectResetCode($code)
    {
        $query = "SELECT `id` FROM `member` WHERE `resetcode`= '" . $code . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function updatePassword($password, $code)
    {
        $enPass = md5($password);
        $query = "UPDATE  `member` SET "
            . "`password` ='" . $enPass . "' "
            . "WHERE `resetcode` = '" . $code . "'";
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
        $query = "UPDATE  `member` SET "
            . "`name` ='" . $this->name . "', "
            . "`phone` ='" . $this->phone . "', "
            . "`email` ='" . $this->email . "', "
            . "`nic` ='" . $this->nic . "', "
            . "`district` ='" . $this->district . "', "
            . "`city` ='" . $this->city . "', "
            . "`address` ='" . $this->address . "', "
            . "`picture` ='" . $this->picture . "' "
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
        $query = 'DELETE FROM `member` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }
    public function GetMemberByDistrict($district)
    {
        $query = "SELECT * FROM `member` WHERE `district` = '" . $district . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function getMembersByOrderCity($city)
    {
        $query = "SELECT * FROM `member` WHERE `id` IN (SELECT `member` FROM `member_area` WHERE `city` = '" . $city . "')";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function arrange($key, $img)
    {
        $query = "UPDATE `member` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
    public function checkOldPass($id, $password) {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function changePassword($id, $password) {

        $enPass = md5($password);

        $query = "UPDATE  `member` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
