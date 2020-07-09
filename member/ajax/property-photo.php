<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['add-new-property-image'])) {
    $PROPERTYPHOTO = new PropertyPhoto(NULL);
    $PROPERTYPHOTO->caption = $_POST['caption'];
    $PROPERTYPHOTO->property = $_POST['property']; 

    $handle1 = new Upload($_FILES['image']);
    $img = Helper::randamId();
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $img;
        $handle1->file_overwrite = TRUE;
        $handle1->image_x = 600;
        $handle1->image_y = 400;
        $handle1->Process('../../upload/properties/gallery/');
        

        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $img;
        $handle1->file_overwrite = TRUE;
        $handle1->image_x = 300;
        $handle1->image_y = 200;
        $handle1->Process('../../upload/properties/gallery/thumb/');
    }
    $PROPERTYPHOTO->image_name = $handle1->file_dst_name;
    

    $VALID = new Validator();
    $VALID->check($PROPERTYPHOTO, [
        'caption' => ['required' => TRUE],
        'image_name' => ['required' => TRUE],
        'property' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $PROPERTYPHOTO->create();
        $result = ["status" => 'success', "id" => $res->property];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}
if (isset($_POST['edit-property-image'])) {
    $PROPERTYPHOTO = new PropertyPhoto($_POST['id']);
    $PROPERTYPHOTO->caption = $_POST['caption'];

    $handle1 = new Upload($_FILES['image']);
    $img = $_POST["image_name_old"];
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_body = TRUE;
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_ext = FALSE;
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $img;
        $handle1->image_x = 600;
        $handle1->image_y = 400;
        $handle1->Process('../../upload/properties/gallery/');
        $img = $handle1->file_dst_name;

        $handle1->image_resize = true;
        $handle1->file_new_name_body = TRUE;
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_ext = FALSE;
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $img;
        $handle1->image_x = 300;
        $handle1->image_y = 200;
        $handle1->Process('../../upload/properties/gallery/thumb/');
        $img = $handle1->file_dst_name;
    }
    $PROPERTYPHOTO->image_name = $_POST["image_name_old"];

    $VALID = new Validator();
    $VALID->check($PROPERTYPHOTO, [
        'caption' => ['required' => TRUE],
        'image_name' => ['required' => TRUE],
        'property' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $PROPERTYPHOTO->update();
        $result = ["status" => 'success', "id" => $res->id];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        
    }
}
if (isset($_POST['arrange-property-photos'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $result = PropertyPhoto::arrange($key, $img);
    }
    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
        exit();
    }
}
if ($_POST['option'] == 'delete') {

    $PROPERTYPHOTO = new PropertyPhoto($_POST['id']);
  
    $result = $PROPERTYPHOTO->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
        exit();
    }
}
