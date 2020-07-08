<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    
    $DISTRICT = new District($_POST['id']);
    // dd($_POST);
    unlink(Helper::getSitePath().'/upload/district/' . $DISTRICT->image_name);
    unlink(Helper::getSitePath().'/upload/district/thumb/' . $DISTRICT->image_name);

    $result = $DISTRICT->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}