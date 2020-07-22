<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $ADVERTISEMENT = new Advertisement(NULL);
    $VALID = new Validator();

    $ADVERTISEMENT->caption = $_POST['caption']; 
    $ADVERTISEMENT->property = $_POST['property']; 

    $dir_dest = '../../upload/advertisement/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 1900;
        $handle->image_y = 830;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $ADVERTISEMENT->image_name = $imgName;

    $VALID->check($ADVERTISEMENT, [
        'caption' => ['required' => TRUE], 
        'image_name' => ['required' => TRUE],
        'property' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ADVERTISEMENT->create();

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
    $dir_dest = '../../upload/advertisement/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 1900;
        $handle->image_y = 830;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $ADVERTISEMENT = new Advertisement($_POST['id']);

    $ADVERTISEMENT->image_name = $_POST['oldImageName'];
    $ADVERTISEMENT->caption = $_POST['caption'];
    $ADVERTISEMENT->property = $_POST['property'];
     
 
    $VALID = new Validator();
    $VALID->check($ADVERTISEMENT, [
        'caption' => ['required' => TRUE], 
        'image_name' => ['required' => TRUE],
        'property' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ADVERTISEMENT->update();

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


if (isset($_POST['save-date'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $ADVERTISEMENT = Advertisement::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}