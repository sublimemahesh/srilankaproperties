<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $PROPERTY_PHOTO = new PropertyPhoto($_POST['id']);

    unlink('../../../upload/property/gallery/' . $PROPERTY_PHOTO->image_name);
    unlink('../../../upload/property/gallery/thumb/' . $PROPERTY_PHOTO->image_name);

    $result = $PROPERTY_PHOTO->delete();


    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}