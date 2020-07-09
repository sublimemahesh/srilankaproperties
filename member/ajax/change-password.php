<?php
include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();

$MEMBER = new Member($_SESSION['m_id']);

$OldPassOk = Member::checkOldPass($_SESSION['m_id'], $_POST["oldPass"]);

if ($_POST["newPass"] === $_POST["confPass"]) {
    if ($OldPassOk) {
        $result = Member::changePassword($_SESSION['m_id'], $_POST["newPass"]);
        if ($result == 'TRUE') {
            $result = ["status" => 'success'];
            echo json_encode($result);
            exit();
        } else {
            $result = ["status" => 'error'];
            echo json_encode($result);
            exit();
        }
    } else {
        $result = ["status" => 'error1'];
        echo json_encode($result);
        exit();
    }
} else {
    $result = ["status" => 'error2'];
    echo json_encode($result);
    exit();
}
