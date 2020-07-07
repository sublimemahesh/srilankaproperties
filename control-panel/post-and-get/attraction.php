<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $ATTRACTION = new Attraction(NULL);
    $VALID = new Validator();

    $ATTRACTION->title = $_POST['title'];
    $ATTRACTION->short_description = ($_POST['short_description']);
    $ATTRACTION->area = ($_POST['area']);
    $ATTRACTION->description = ($_POST['description']);
    $ATTRACTION->price = ($_POST['price']);
    $ATTRACTION->map = $_POST['map'];
    $ATTRACTION->features = ($_POST['features']);

    $dir_dest = '../../upload/attraction/';
    $dir_dest_plan = '../../upload/offer/plan/';

    $handle = new Upload($_FILES['image']);
    $handle1 = new Upload($_FILES['plan_image']);

    $imgName = null;
    $imgNamePlan = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 560;
        $handle->image_y = 368;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    if ($handleplan->uploaded) {
        $handleplan->image_resize = true;
        $handleplan->file_new_name_ext = 'jpg';
        $handleplan->image_ratio_crop = 'C';
        $handleplan->file_new_name_body = Helper::randamId();
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        $newSize = Helper::calImgResize(700, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];

        $handleplan->image_x = $image_x;
        $handleplan->image_y = $image_y;



        $handleplan->Process($dir_dest_plan);

        if ($handleplan->processed) {
            $info = getimagesize($handleplan->file_dst_pathname);
            $imgNamePlan = $handleplan->file_dst_name;
        }
    }

    $ATTRACTION->image_name = $imgName;
    $ATTRACTION->plan_image = $imgNamePlan;

    $VALID->check($ATTRACTION, [
        'title' => ['required' => TRUE],
        'short_description' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ATTRACTION->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();
        header("location: ../view-attraction-photos.php?id=" . $ATTRACTION->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {


    $dir_dest = '../../upload/attraction/';
    $dir_dest_plan = '../../upload/attraction/plan/';

    $handle = new Upload($_FILES['planimage']);
    $handle1 = new Upload($_FILES['image']);


    $imgName = null;
    $imgPlan = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldPlanImageName"];
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        $newSize = Helper::calImgResize(700, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];

        $handle->image_x = $image_x;
        $handle->image_y = $image_y;



        $handle->Process($dir_dest_plan);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgPlan = $handle->file_dst_name;
        }
    }

    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_body = TRUE;
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_ext = FALSE;
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = $_POST ["oldImageName"];
        $handle1->image_x = 364;
        $handle1->image_y = 254;

        $handle1->Process($dir_dest);

        if ($handle1->processed) {
            $info = getimagesize($handle1->file_dst_pathname);
            $imgName = $handle1->file_dst_name;
        }
    }

    $ATTRACTION = new Attraction($_POST['id']);


    $ATTRACTION->image_name = $_POST['oldImageName'];
    $ATTRACTION->plan_image = $_POST ["oldPlanImageName"];
    $ATTRACTION->title = $_POST['title'];
    $ATTRACTION->area = ($_POST['area']);
    $ATTRACTION->map = ($_POST['map']);
    $ATTRACTION->short_description = $_POST['short_description'];
    $ATTRACTION->description = $_POST['description'];
    $ATTRACTION->price = ($_POST['price']);
    $ATTRACTION->features = ($_POST['features']);

    $VALID = new Validator();
    $VALID->check($ATTRACTION, [
        'title' => ['required' => TRUE],
        'short_description' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ATTRACTION->update();

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

        $ATTRACTION = Attraction::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}    