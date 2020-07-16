<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();

$MEMBER = new Member(NULL);
$code = $_POST["code"];
$password = $_POST["password"];
$confpassword = $_POST["confirm_password"];

if ($MEMBER->SelectResetCode($code)) {
    $MEMBER->updatePassword($password, $code);
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
} else {
    $result = ["status" => 'error'];
    echo json_encode($result);
    exit();
}
