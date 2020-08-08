<?php
include_once(dirname(__FILE__) . '/../class/include.php');

if (!isset($_SESSION)) {
    session_start();
}
// dd($_POST['txtFullName']);
if (isset($_POST['btn-comment'])) {

    $response = array();
    if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {
        header('Content-Type: application/json');

        $result = [
            "message" => 'captchaerror'
        ];
        echo json_encode($result);
        exit();
    } else {
        $folder = '../upload/comments/';
        $imgName = Helper::randamId();

        $handle = new Upload($_FILES['imageName']);

        if ($handle->uploaded) {

            $handle->image_resize = true;
            $handle->file_new_name_ext = 'jpg';
            $handle->image_ratio_crop = 'C';
            $handle->file_new_name_body = $imgName;
            $handle->image_x = 220;
            $handle->image_y = 220;

            $handle->Process($folder);

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
               
            }
        }
        $COMMENT = new Comments(NULL);

        $COMMENT->name = $_POST["txtFullName"];
        $COMMENT->title = $_POST["txtTitle"];
        $COMMENT->image_name = $imgName;
        $COMMENT->comment = $_POST["txtComment"];
        $res = $COMMENT->create();
        if ($res) {
            header('Content-Type: application/json');

            $result = [
                "filename" => $imgName,
                "id" => $COMMENT->id,
                "message" => 'success',
               
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
    }
}