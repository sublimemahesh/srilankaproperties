category<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $CATEGORY_PHOTO = new CategoryPhoto($_POST['id']);

    unlink('../../../upload/category/gallery/' . $CATEGORY_PHOTO->image_name);
    unlink('../../../upload/category/gallery/thumb/' . $CATEGORY_PHOTO->image_name);

    $result = $CATEGORY_PHOTO->delete();


    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}