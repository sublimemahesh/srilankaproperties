<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {
    // dd($_POST);
    $PROPERTY = new Property(NULL);
    $VALID = new Validator();

    $PROPERTY->title = $_POST['title'];
    $PROPERTY->short_description = $_POST['short_description'];
    $PROPERTY->description = $_POST['description'];
    $PROPERTY->price = $_POST['price'];
    $PROPERTY->category = $_POST['category'];
    $PROPERTY->sub_category = $_POST['sub_category'];
    $PROPERTY->housetype = $_POST['housetype'];
    $PROPERTY->contact = $_POST['contact'];
    $PROPERTY->map = $_POST['map'];
    $PROPERTY->features = $_POST['features'];
 
    $dir_dest = '../../upload/property/';
    $dir_dest_plan = '../../upload/property/plan/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;


    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 330;
        $handle->image_y = 220;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $PROPERTY->image_name = $imgName;

    $VALID->check($PROPERTY, [
        'title' => ['required' => TRUE],
        'short_description' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'price' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);


    if ($VALID->passed()) {
        $PROPERTY->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/properties/';
    $handle1 = new Upload($_FILES['image']);

    $imgName = null;
   
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_body = TRUE;
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_ext = FALSE;
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $_POST ["oldImageName"];
        $handle1->image_x = 330;
        $handle1->image_y = 220;

        $handle1->Process($dir_dest);

        if ($handle1->processed) {
            $info = getimagesize($handle1->file_dst_pathname);
            $imgName = $handle1->file_dst_name;
        }
    }

    $PROPERTY = new Property($_POST['id']);

    $PROPERTY->member = $_POST['member'];
    $PROPERTY->image_name = $_POST['oldImageName'];
    $PROPERTY->title = $_POST['title'];
    $PROPERTY->category = $_POST['category'];
    $PROPERTY->sub_category = $_POST['sub_category'];
    $PROPERTY->district = $_POST['district'];
    $PROPERTY->city = $_POST['city'];
    $PROPERTY->address = $_POST['address'];
    $PROPERTY->email = $_POST['email'];
    $PROPERTY->contact = $_POST['contact'];
    $PROPERTY->price = $_POST['price'];
    $PROPERTY->price_dollar = $_POST['price_dollar'];
    $PROPERTY->no_of_bed_rooms = $_POST['no_of_bed_rooms'];
    $PROPERTY->description = $_POST['description'];


    $VALID = new Validator();

    $VALID->check($PROPERTY, [
        'title' => ['required' => TRUE],
        'category' => ['required' => TRUE],
        'sub_category' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'price' => ['required' => TRUE],
        'price_dollar' => ['required' => TRUE],
        'no_of_bed_rooms' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);


    if ($VALID->passed()) {
        $PROPERTY->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $PROPERTY = Property::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}


if ($_POST['option'] == "APPROVEPROPERTY") {
    
    if (Property::approveOrRejectProperty($_POST['property'],1)) {
        
        echo json_encode("approved");
        exit;

    }

}

if ($_POST['option'] == "REJECTPROPERTY") {

    if (Property::approveOrRejectProperty($_POST['property'],0)) {
        
        echo json_encode("rejected");
        exit;

    }

}