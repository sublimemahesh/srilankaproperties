<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['add-new-property'])) {
    $PROPERTY = new Property(NULL);
    $PROPERTY->member = $_POST['member'];
    $PROPERTY->title = $_POST['title'];
    $PROPERTY->category = $_POST['category'];
    $PROPERTY->sub_category = $_POST['sub_category'];
    $PROPERTY->district = $_POST['district'];
    $PROPERTY->city = $_POST['city'];
    $PROPERTY->housetype = $_POST['house_type'];
    $PROPERTY->location = $_POST['location'];
    $PROPERTY->map = $_POST['map_code'];
    $PROPERTY->price = $_POST['price'];
    $PROPERTY->contact = $_POST['phone_number'];
    $PROPERTY->features = $_POST['features'];
    $PROPERTY->description = $_POST['description'];
    // $PROPERTY->short_description = $_POST['short_description'];
    /////NIC PHOTO FRONT
    $handle1 = new Upload($_FILES['image']);
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = Helper::randamId();
        $handle1->file_overwrite = TRUE;
        $handle1->image_x = 300;
        $handle1->image_y = 300;
        $handle1->Process('../../upload/properties/');
        $PROPERTY->image_name = $handle1->file_dst_name;
    }

    $VALID = new Validator();
    $VALID->check($PROPERTY, [
        'title' => ['required' => TRUE],
        'category' => ['required' => TRUE],
        'sub_category' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'location' => ['required' => TRUE],
        'price' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'features' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        // 'short_description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $PROPERTY->create();
        $result = ["status" => 'success', "id" => $res->id];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}