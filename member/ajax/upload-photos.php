<?php
include '/../../class/include.php';
// dd($_POST);
if (isset($_POST['upload-post-image'])) {

    $dir_dest = '../../../upload/properties/';
    $imgName = Helper::randamId();
    //    dd($_FILES['post-image']['name'] == '');
    if ($_FILES['post-image']['name'] == '') {
        $handle1 = new Upload($_FILES['upload-other-images']);
    } else {
        $handle1 = new Upload($_FILES['post-image']);
    }
    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_body = $imgName;
        $handle1->image_x = 1500;
        $handle1->image_y = 700;
        $handle1->Process('../../upload/properties/gallery/');
        $img = $handle1->file_dst_name;

        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_overwrite = TRUE;
        $handle1->file_new_name_body = $imgName;
        $handle1->image_x = 300;
        $handle1->image_y = 200;
        $handle1->Process('../../upload/properties/gallery/thumb/');
        $img = $handle1->file_dst_name;

        if ($handle1->processed) {
            $handle1->Clean();
            header('Content-Type: application/json');
            $result = [
                "filename" => $handle1->file_dst_name,
                "message" => 'success'
            ];
            echo json_encode($result);
            exit();
        } else {
            header('Content-Type: application/json');
            $result = [
                "message" => 'error'
            ];
            echo json_encode($result);
            exit();
        }
    } else {
        header('Content-Type: application/json');
        $result = [
            "message" => 'error'
        ];
        echo json_encode($result);
        exit();
    }
}


if ($_POST['option'] == 'DELETEIMAGE') {
    unlink(Helper::getSitePath() . "upload/properties/gallery/" . $_POST['image_name'] . ".jpg");
    unlink(Helper::getSitePath() . "upload/properties/gallery/thumb/" . $_POST['image_name'] . ".jpg");
    header('Content-Type: application/json');
    $result = 'success';

    echo json_encode($result);
    exit();
}


if ($_POST['option'] == 'DELETEPOSTIMAGES') {

    $images = PropertyPhoto::getPropertyPhotosByProperty($_POST['post']);
    foreach ($images as $img) {
        unlink(Helper::getSitePath() . "upload/properties/gallery/" . $img['image_name']);
        unlink(Helper::getSitePath() . "upload/properties/gallery/thumb/" . $img['image_name']);

        $POSTIMAGES = new PostImage($img['id']);
        $POSTIMAGES->delete();
    }

    header('Content-Type: application/json');
    $result = 'success';

    echo json_encode($result);
    exit();
}
