<?php
 
include_once(dirname(__FILE__) . '/../../class/include.php');

$USER = new User(NULL);

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if ($USER->login($username, $password)) {
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
} else {
    $result = ["status" => 'error'];
    echo json_encode($result);
    exit();
}