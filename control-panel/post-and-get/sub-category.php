<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $SUB_CATEGORY = new SubCategory(NULL);
    $VALID = new Validator();

    $SUB_CATEGORY->category = $_POST['category'];
    $SUB_CATEGORY->name = $_POST['name'];
    
    $VALID->check($SUB_CATEGORY, [
        'name' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $SUB_CATEGORY->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();
//        header("location: ../view-sub_category-photos.php?id=" . $SUB_CATEGORY->id);
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

    $SUB_CATEGORY = new SubCategory($_POST['id']);



    $SUB_CATEGORY->name = $_POST['name'];
    $VALID = new Validator();
    $VALID->check($SUB_CATEGORY, [
        'name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $SUB_CATEGORY->update();

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

if (isset($_POST['save-arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $SUB_CATEGORY = SubCategory::arrange($key, $img);
    }
    $VALID = new Validator();
        $VALID->addError("Your data was arranged successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
}