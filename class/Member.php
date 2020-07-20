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
    public $joinedAt;
    public $name;
    public $phone;
    public $email;
    public $nic;
    public $address;
    public $district;
    public $city;
    public $picture;
    public $description;
    public $password;
    private $authToken;
    public $resetcode;
    public $isActive;
    public function __construct($id)
    {
        if ($id) {
            $query = "SELECT  * FROM `member` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->joinedAt = $result['joined_at'];
            $this->name = $result['name'];
            $this->phone = $result['phone'];
            $this->email = $result['email'];
            $this->nic = $result['nic'];
            $this->address = $result['address'];
            $this->city = $result['city'];
            $this->district = $result['district'];
            $this->picture = $result['picture'];
            $this->description = $result['description'];
            $this->password = $result['password'];
            $this->authToken = $result['auth_token'];
            $this->isActive = $result['is_active'];
            return $this;
        }
    }
    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `member` ("
            . "`joined_at`, "
            . "`name`, "
            . "`phone`, "
            . "`email`,"
            . "`password`,"
            . "`nic`,"
            . "`address`,"
            . "`district`,"
            . "`city`,"
            . "`picture`,"
            . "`description`,"
            . "`is_active`"
            . ") VALUES  ('"
            . $createdAt . "','"
            . $this->name . "','"
            . $this->phone . "', '"
            . $this->email . "', '"
            . $this->password . "', '"
            . $this->nic . "', '"
            . $this->address . "', '"
            . $this->district . "', '"
            . $this->city . "', '"
            . $this->picture . "', '"
            . $this->description . "', '"
            . 1 . "')";
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
    public function checkEmailForResetPassword($email) {

        $query = "SELECT `email`,`name` FROM `member` WHERE `email`= '" . $email . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
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
            . "`reset_code` ='" . $rand . "' "
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
            $query = "SELECT `email`,`name`,`reset_code` FROM `member` WHERE `email`= '" . $email . "'";
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->resetcode = $result['reset_code'];
            return $result;
        }
    }
    public function selectResetCode($code)
    {
        $query = "SELECT `id` FROM `member` WHERE `reset_code`= '" . $code . "'";
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
            . "`password` ='" . $enPass . "', "
            . "`reset_code` ='" . 0 . "' "
            . "WHERE `reset_code` = '" . $code . "'";
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
            . "`picture` ='" . $this->picture . "', "
            . "`description` ='" . $this->description . "' "
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
    public function getActiveMembers($pageLimit, $setLimit)
    {
        $query = "SELECT * FROM `member` WHERE `is_active` = 1 ORDER BY `joined_at` ASC LIMIT " . $pageLimit . " , " . $setLimit . "";
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
    public function checkOldPass($id, $password)
    {

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
    public function changePassword($id, $password)
    {

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
    public function MemberActivation($id, $status)
    {
        $query = "UPDATE  `member` SET "
            . "`is_active` ='" . $status . "' "
            . "WHERE `id` = '" . $id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function showPagination($per_page, $page)
    {


        $page_url = "?";
        $query = "SELECT COUNT(*) as totalCount FROM `member` WHERE `is_active` = 1 ORDER BY `joined_at` asc";
        $rec = mysql_fetch_array(mysql_query($query));

        $total = $rec['totalCount'];

        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;

        $setLastpage = ceil($total / $per_page);

        $lpm1 = $setLastpage - 1;
        $setPaginate = "";
        if ($setLastpage > 1) {
            $setPaginate .= "<ul class='pagination'>";
            // $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";

            if ($page > 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$prev'><i class='fa fa-chevron-left'></i></a></li>";
            } else {
                $setPaginate .= "<li class='disable'><a><i class='fa fa-chevron-left'></i></a></li>";
            }


            if ($setLastpage < 7 + ($adjacents * 2)) {

                for ($counter = 1; $counter <= $setLastpage; $counter++) {

                    if ($counter == $page)
                        $setPaginate .= "<li class='active'><a>$counter</a></li>";
                    else
                        $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                }
            } elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                } elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                } else {
                    $setPaginate .= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$next'><i class='fa fa-chevron-right'></i></a></li>";
            } else {
                $setPaginate .= "<li class='disable'><a><i class='fa fa-chevron-right'></i></a></li>";
            }

            $setPaginate .= "</ul>\n";
        }

        echo $setPaginate;
    }
}
