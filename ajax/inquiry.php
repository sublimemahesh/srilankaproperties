<?php
include_once(dirname(__FILE__) . '/../class/include.php');
session_start();
if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {

    $result = ["status" => 'error_captcha'];
    echo json_encode($result);
    exit();
}
$INQUIRY = new Inquiry(NULL);
$INQUIRY->name = $_POST['txtFullName'];
$INQUIRY->email = $_POST['txtEmail'];
$INQUIRY->phone = $_POST['txtContact'];
$INQUIRY->address = $_POST['txtAddress'];
$INQUIRY->property = $_POST['txtProperty'];
$INQUIRY->message = $_POST['txtMessage'];

$VALID = new Validator();
$VALID->check($INQUIRY, [
    'name' => ['required' => TRUE],
    'email' => ['required' => TRUE],
    'phone' => ['required' => TRUE],
    'address' => ['required' => TRUE],
    'property' => ['required' => TRUE],
    'address' => ['required' => TRUE],
    'message' => ['required' => TRUE]
]);

if ($VALID->passed()) {
   $res =  $INQUIRY->create();
   if($res) {
    $INQUIRY->sendMail($res);
    $INQUIRY->sendMailToMember($res);
   }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
} else {
    $result = ["status" => 'error'];
    echo json_encode($result);
    exit();
}
