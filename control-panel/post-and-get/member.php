<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

if ($_POST['option'] == "ACTIVEMEMBER") {

    if (Member::MemberActivation($_POST['member'], 1)) {

        echo json_encode("activated");
        exit;
    }
}

if ($_POST['option'] == "INACTIVEMEMBER") {

    if (Member::MemberActivation($_POST['member'], 0)) {

        echo json_encode("inactivated");
        exit;
    }
}
