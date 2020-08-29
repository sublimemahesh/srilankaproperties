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
    public $description;
    public $price;
    public $price_dollar;
    public $contact;
    public $address;
    public $email;
    public $features;
    public $queue;
    public $status;
    public $no_of_bed_rooms;
    public $isBoosted;
    public $boostedAt;

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
            $this->description = $result['description'];
            $this->price = $result['price'];
            $this->price_dollar = $result['price_dollar'];
            $this->contact = $result['contact'];
            $this->address = $result['address'];
            $this->email = $result['email'];
            $this->features = $result['features'];
            $this->queue = $result['queue'];
            $this->status = $result['status'];
            $this->no_of_bed_rooms = $result['no_of_bed_rooms'];
            $this->isBoosted = $result['is_boosted'];
            $this->boostedAt = $result['boosted_at'];

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
            . "`description`,"
            . "`price`,"
            . "`price_dollar`,"
            . "`contact`,"
            . "`address`,"
            . "`email`,"
            . "`features`,"
            . "`queue`,"
            . "`status`,"
            . "`no_of_bed_rooms`,"
            . "`is_boosted`,"
            . "`boosted_at`"
            . ") VALUES  ('"
            . $createdAt . "','"
            . $this->member . "','"
            . $this->title . "','"
            . $this->category . "', '"
            . $this->sub_category . "', '"
            . $this->district . "', '"
            . $this->city . "', '"
            . $this->image_name . "', '"
            . $this->description . "', '"
            . $this->price . "', '"
            . $this->price_dollar . "', '"
            . $this->contact . "', '"
            . $this->address . "', '"
            . $this->email . "', '"
            . $this->features . "', '"
            . $this->queue . "', '"
            . 0 . "', '"
            . $this->no_of_bed_rooms . "', '"
            . $this->isBoosted . "', '"
            . $this->boostedAt . "')";

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

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.status = 0 ORDER BY `id` DESC";
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

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.status = 1 ORDER BY  `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getBoostedProperties()
    {

        $query = "SELECT p.*,c.name category_name,sc.name sub_category_name FROM `property` p, `category` c , `sub_category` sc WHERE c.id = p.category AND sc.id = p.sub_category AND p.is_boosted = 1 ORDER BY  `boosted_at` DESC";
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

        $query = "SELECT * FROM `property` WHERE `category` = $category AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPropertiesByCategoryWithLimit($category, $pageLimit, $setLimit)
    {

        $query = "SELECT * FROM `property` WHERE `category` = $category AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 
         ORDER BY CASE
        WHEN `is_boosted` = 1 THEN 1
        ELSE 2 END, `boosted_at` DESC, `id` DESC
          LIMIT " . $pageLimit . " , " . $setLimit;
        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPropertiesByMember($member)
    {

        $query = "SELECT * FROM `property` WHERE `member` = $member AND `status` = 1 ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getPropertiesByMemberWithLimit($member, $pageLimit, $setLimit)
    {

        $query = "SELECT * FROM `property` WHERE `member` = $member AND `status` = 1 
        ORDER BY CASE
        WHEN `is_boosted` = 1 THEN 1
        ELSE 2 END, `boosted_at` DESC, `id` DESC
         DESC LIMIT " . $pageLimit . " , " . $setLimit;
        $db = new Database();
        dd($query);
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getPropertiesBySubCategoryWithLimit($subcategory, $pageLimit, $setLimit)
    {

        $query = "SELECT * FROM `property` WHERE `sub_category` = $subcategory AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1
         ORDER BY CASE
        WHEN `is_boosted` = 1 THEN 1
        ELSE 2 END, `boosted_at` DESC, `id` DESC
         LIMIT " . $pageLimit . " , " . $setLimit;
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

        $query = "SELECT * FROM `property` WHERE `sub_category` = $subcategory AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function boostProperty($property)
    {
        date_default_timezone_set('Asia/Colombo');
        $boostedAt = date('Y-m-d H:i:s');

        $query = "UPDATE `property` SET  `is_boosted`= 1, `boosted_at` = '" . $boostedAt . "' WHERE `id` = $property";
        // dd($query);
        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {

            return TRUE;
        } else {

            return FALSE;
        }
    }
    public function stopBoost($property)
    {
        $query = "UPDATE `property` SET  `is_boosted`= 0, `boosted_at` = '' WHERE `id` = $property";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {

            return TRUE;
        } else {

            return FALSE;
        }
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
            . "`description` ='" . $this->description . "', "
            . "`price` ='" . $this->price . "', "
            . "`price_dollar` ='" . $this->price_dollar . "', "
            . "`contact` ='" . $this->contact . "', "
            . "`address` ='" . $this->address . "', "
            . "`email` ='" . $this->email . "', "
            . "`features` ='" . $this->features . "', "
            . "`status` ='" . 0 . "', "
            . "`queue` ='" . $this->queue . "', "
            . "`no_of_bed_rooms` ='" . $this->no_of_bed_rooms . "' "
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
    public function deleteProperty()
    {

        $query = 'DELETE FROM `property` WHERE id="' . $this->id . '"';
        unlink(Helper::getSitePath() . "upload/property/" . $this->image_name);

        $db = new Database();

        return $db->readQuery($query);
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

        $query = "SELECT * FROM `property` WHERE `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY CASE
        WHEN `is_boosted` = 1 THEN 1
        ELSE 2 END, `boosted_at` DESC, `id` DESC";

        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllPropertiesByLimit($pageLimit, $setLimit)
    {

        $query = "SELECT * FROM `property` WHERE `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY `id` DESC LIMIT " . $pageLimit . " , " . $setLimit;
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getDistinctCategoriesByMember($id)
    {

        $query = "SELECT `category` FROM `property` WHERE `member` = $id AND `status` = 1 GROUP BY `category` ORDER BY `category` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getPropertiesByMemberAndCategory($id, $category)
    {

        $query = "SELECT * FROM `property` WHERE `member` = $id AND `status` = 1 AND `category` = $category ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function search($keyword, $category, $subcategory, $district, $city, $pageLimit, $setLimit)
    {

        $w = array();
        $where = '';


        if (!empty($keyword)) {
            $w[] = "(`title` LIKE '%" . $keyword . "%' OR `category` IN (SELECT `id` FROM `category` WHERE `name` LIKE '%" . $keyword . "%') OR  `sub_category` IN (SELECT `id` FROM `sub_category` WHERE `name` LIKE '%" . $keyword . "%') OR  `district` IN (SELECT `id` FROM `district` WHERE `name` LIKE '%" . $keyword . "%') OR  `city` IN (SELECT `id` FROM `city` WHERE `name` LIKE '%" . $keyword . "%'))";
        }
        if (!empty($category)) {
            $w[] = "`category` = '" . $category . "' ";
        }
        if (!empty($subcategory)) {
            $w[] = "`sub_category` = '" . $subcategory . "' ";
        }
        if (!empty($district)) {
            $w[] = "`district` = '" . $district . "' ";
        }
        if (!empty($city)) {
            $w[] = "`city` = '" . $city . "' ";
        }

        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $query = "SELECT * FROM `property` $where AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY CASE
        WHEN `is_boosted` = 1 THEN 1
        ELSE 2 END, `boosted_at` DESC, `id` DESC LIMIT " . $pageLimit . " , " . $setLimit . "";
        $db = new Database();

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function showPaginationForSearch($keyword, $category, $subcategory, $district, $city, $per_page, $page)
    {
        $w = array();
        $where = '';
        if (!empty($keyword)) {
            $w[] = "(`title` LIKE '%" . $keyword . "%' OR `category` IN (SELECT `id` FROM `category` WHERE `name` LIKE '%" . $keyword . "%') OR  `sub_category` IN (SELECT `id` FROM `sub_category` WHERE `name` LIKE '%" . $keyword . "%') OR  `district` IN (SELECT `id` FROM `district` WHERE `name` LIKE '%" . $keyword . "%') OR  `city` IN (SELECT `id` FROM `city` WHERE `name` LIKE '%" . $keyword . "%'))";
        }
        if (!empty($category)) {
            $w[] = "`category` = '" . $category . "' ";
        }
        if (!empty($subcategory)) {
            $w[] = "`sub_category` = '" . $subcategory . "' ";
        }
        if (!empty($district)) {
            $w[] = "`district` = '" . $district . "' ";
        }
        if (!empty($city)) {
            $w[] = "`city` = '" . $city . "' ";
        }

        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $page_url = "?";
        $query = "SELECT COUNT(*) as totalCount FROM `property`  $where AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY `id` DESC";
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
                        $setPaginate .= "<li><a href='{$page_url}page=$counter&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$counter</a></li>";
                }
            } elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$setLastpage</a></li>";
                } elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>2</a></li>";
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$setLastpage</a></li>";
                } else {
                    $setPaginate .= "<li><a href='{$page_url}page=1&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>2</a></li>";
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&keyword=$keyword&category=$category&sub_category=$subcategory&district=$district&city=$city'>$counter</a></li>";
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

    public function showPagination($category, $subcategory, $agent, $per_page, $page)
    {

        $w = array();
        $where = '';

        if (!empty($category)) {
            $w[] = "`category` = '" . $category . "' ";
        }
        if (!empty($subcategory)) {
            $w[] = "`sub_category` = '" . $subcategory . "' ";
        }
        if (!empty($agent)) {
            $w[] = "`member` = '" . $agent . "' ";
        }

        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $page_url = "?";
        $query = "SELECT COUNT(*) as totalCount FROM `property` $where  AND `member` IN (SELECT `id` FROM `member` WHERE `is_active` = 1) AND `status` = 1 ORDER BY `id` DESC";

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
                $setPaginate .= "<li><a href='{$page_url}page=$prev&category=$category&sub_category=$subcategory'><i class='fa fa-chevron-left'></i></a></li>";
            } else {
                $setPaginate .= "<li class='disable'><a><i class='fa fa-chevron-left'></i></a></li>";
            }


            if ($setLastpage < 7 + ($adjacents * 2)) {

                for ($counter = 1; $counter <= $setLastpage; $counter++) {

                    if ($counter == $page)
                        $setPaginate .= "<li class='active'><a>$counter</a></li>";
                    else
                        $setPaginate .= "<li><a href='{$page_url}page=$counter&category=$category&sub_category=$subcategory'>$counter</a></li>";
                }
            } elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&category=$category&sub_category=$subcategory'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&category=$category&sub_category=$subcategory'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&category=$category&sub_category=$subcategory'>$setLastpage</a></li>";
                } elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1&category=$category&sub_category=$subcategory'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&category=$category&sub_category=$subcategory'>2</a></li>";
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&category=$category&sub_category=$subcategory'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&category=$category&sub_category=$subcategory'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&category=$category&sub_category=$subcategory'>$setLastpage</a></li>";
                } else {
                    $setPaginate .= "<li><a href='{$page_url}page=1&category=$category&sub_category=$subcategory'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&category=$category&sub_category=$subcategory'>2</a></li>";
                    $setPaginate .= "<li class='dot'><a>...</a></li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='active'><a>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&category=$category&sub_category=$subcategory'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$next&category=$category&sub_category=$subcategory'><i class='fa fa-chevron-right'></i></a></li>";
            } else {
                $setPaginate .= "<li class='disable'><a><i class='fa fa-chevron-right'></i></a></li>";
            }

            $setPaginate .= "</ul>\n";
        }

        echo $setPaginate;
    }
}