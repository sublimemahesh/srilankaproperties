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
    $PROPERTY->address = $_POST['address'];
    $PROPERTY->email = $_POST['email'];
    $PROPERTY->price = $_POST['price'];
    $PROPERTY->contact = $_POST['phone_number'];
    $PROPERTY->description = $_POST['description'];
    
    $handle1 = new Upload($_FILES['image']);
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = Helper::randamId();
        $handle1->file_overwrite = TRUE;
        $handle1->image_x = 300;
        $handle1->image_y = 200;
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
        'address' => ['required' => TRUE],
        'price' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'description' => ['required' => TRUE],
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
if (isset($_POST['edit-property'])) {
   
    $PROPERTY = new Property($_POST['id']);
    $PROPERTY->member = $_POST['member'];
    $PROPERTY->title = $_POST['title'];
    $PROPERTY->category = $_POST['category'];
    $PROPERTY->sub_category = $_POST['sub_category'];
    $PROPERTY->district = $_POST['district'];
    $PROPERTY->city = $_POST['city'];
    $PROPERTY->address = $_POST['address'];
    $PROPERTY->email = $_POST['email'];
    $PROPERTY->price = $_POST['price'];
    $PROPERTY->contact = $_POST['phone_number'];
    $PROPERTY->description = $_POST['description'];
    
    $handle1 = new Upload($_FILES['image']);
    $img = $_POST["image_name_old"];
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_body = TRUE;
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_ext = FALSE;
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $img;
        $handle1->image_x = 300;
        $handle1->image_y = 200;
        $handle1->Process('../../upload/properties/');
        $img = $handle1->file_dst_name;
    }
    $PROPERTY->image_name = $_POST["image_name_old"];

    $VALID = new Validator();
    $VALID->check($PROPERTY, [
        'title' => ['required' => TRUE],
        'category' => ['required' => TRUE],
        'sub_category' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'price' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $PROPERTY->update();
        $result = ["status" => 'success', "id" => $res->id];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}
if ($_POST['option'] == 'delete') {

    $PROPERTY = new Property($_POST['id']);
  
    $result = $PROPERTY->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}