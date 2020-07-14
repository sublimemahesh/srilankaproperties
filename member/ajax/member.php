<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

$MEMBER = new Member($_POST['id']);
$MEMBER->name = $_POST['name'];
$MEMBER->phone = $_POST['phone'];
$MEMBER->email = $_POST['email'];
$MEMBER->district = $_POST['district'];
$MEMBER->city = $_POST['city'];
$MEMBER->address = $_POST['address'];
$MEMBER->nic = $_POST['nic'];
$MEMBER->description = $_POST['description'];
/////NIC PHOTO FRONT
$handle1 = new Upload($_FILES['image_name']);
if ($handle1->uploaded) {
    $handle1->image_resize = true;
    $handle1->file_new_name_ext = 'jpg';
    $handle1->image_ratio_crop = 'C';
    if (empty($_POST['image_name_ex'])) {
        $MEMBER->picture = Helper::randamId();
    }
    $handle1->file_new_name_body = explode(".", $MEMBER->picture)[0];
    $handle1->file_overwrite = TRUE;
    $handle1->image_x = 300;
    $handle1->image_y = 300;
    $handle1->Process('../../upload/member/profile/');
    $MEMBER->picture = $handle1->file_dst_name;
}

$VALID = new Validator();
$VALID->check($MEMBER, [
    'name' => ['required' => TRUE],
    'phone' => ['required' => TRUE],
    'email' => ['required' => TRUE],
    'district' => ['required' => TRUE],
    'city' => ['required' => TRUE],
    'address' => ['required' => TRUE],
    'nic' => ['required' => TRUE],
    'picture' => ['required' => TRUE],
    'description' => ['required' => TRUE]
]);
$checkEmail = $MEMBER->checkEmail($_POST['id'], $_POST['email']);
if (!$checkEmail || $checkEmail['id'] == $_POST['id']) {
    if ($VALID->passed()) {
        $MEMBER->update();
        $result = ["status" => 'success'];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
} else {
    $result = ["status" => 'error1'];
    echo json_encode($result);
    exit();
}
