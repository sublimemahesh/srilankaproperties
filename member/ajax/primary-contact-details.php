<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if ($_POST['action'] == 'send_email_verification') {

    require_once "Mail.php";
    $MEMBER = new Member($_POST['member_id']);
    $MEMBER->e_verification_code = rand(10000, 99999);
    $result = $MEMBER->update();

    //---------------------- SERVER WEBMAIL LOGIN ------------------------
    $host = "sg1-ls7.a2hosting.com";
    $username = "info@srilankaproperties.lk";
    $password = "x_EC#_KC!,7s";
    //------------------------ MAIL ESSENTIALS --------------------------------
    $webmail = "info@srilankaproperties.lk";
    $visitorSubject = "Email Verification Code - www.srilankaproperties.lk";

    // Compose a simple HTML email message
    $message = '<html>';
    $message .= '<body>';
    $message .= '<div  style="padding: 10px; max-width: 650px; background-color: #f2f1ff; border: 1px solid #d4d4d4;">';
    $message .= '<h4>Thank you for registering on www.srilankaproperties.lk</h4>';
    $message .= '<p>You must verify your email before publishing content on the website. Please copy the below code and insert into the verification page of the website!</p>';
    $message .= '<p>Email: ' . $MEMBER->email . '</p>';
    $message .= '<hr/>';
    $message .= '<h3>Verification Code : ' . $MEMBER->e_verification_code . '</h3>';
    $message .= '<hr/>';
    $message .= '<p>Thanks & Best Regards!.. <br/> www.srilankaproperties.lk<p/>';
    $message .= '<small>*Please do not reply to this email. This is an automated email & you will not receive a response.</small><br/>';
    $message .= '<span>Hotline: +94 77 455 4141 </span><br/>';
    $message .= '<span>Email: info@srilankaproperties.lk</span>';
    $message .= '</div>';
    $message .= '</body>';
    $message .= '</html>';


    $visitorHeaders = array(
        'MIME-Version' => '1.0', 'Content-Type' => "text/html; charset=ISO-8859-1", 'From' => $webmail,
        'To' => $MEMBER->email,
        'Reply-To' => $webmail,
        'Subject' => $visitorSubject
    );
    $smtp = Mail::factory('smtp', array(
        'host' => $host,
        'auth' => true,
        'username' => $username,
        'password' => $password
    ));
    $visitorMail = $smtp->send($MEMBER->email, $visitorHeaders, $message);
    if (PEAR::isError($visitorMail)) {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'error';
        echo json_encode($response);
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'success';
        $response['code'] = $MEMBER->e_verification_code;
        $response['email'] = $MEMBER->email;
        echo json_encode($response);
        exit();
    }
}

if ($_POST['action'] == 'email_verification_code') {

    $MEMBER = new Member($_POST['member_id']);

    if ($MEMBER->e_verification_code == $_POST['email_verification_code']) {
        $MEMBER->email_verified = 1;
        $result = $MEMBER->update();
        if ($result) {
            header('Content-Type: application/json; charset=UTF8');
            $response['status'] = 'success';
            echo json_encode($response);
            exit();
        } else {
            header('Content-Type: application/json; charset=UTF8');
            $response['status'] = 'error';
            echo json_encode($response);
        }
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'incorrect';
        echo json_encode($response);
    }
}

if ($_POST['action'] == 'change_email') {

    $MEMBER = new Member($_POST['member_id']);
    $MEMBER->e_verification_code = rand(10000, 99999);
    $MEMBER->email_verified = 0;
    $MEMBER->email = $_POST['email'];
    $result = $MEMBER->update();

    $to = '<' . $MEMBER->email . '>';
    $subject = 'Email Verification Code - www.srilankaproperties.lk';
    $from = 'SRI LANKA PROPERTY NOREPLY <info@srilankaproperties.lk>';

    // To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>';
    $message .= '<body>';
    $message .= '<div  style="padding: 10px; max-width: 650px; background-color: #f2f1ff; border: 1px solid #d4d4d4;">';
    $message .= '<h4>Thank you for registering on www.srilankaproperties.lk</h4>';
    $message .= '<p>You must verify your email before publishing content on the website. Please copy the below code and insert into the verification page of the website!</p>';
    $message .= '<p>Email: ' . $MEMBER->email . '</p>';
    $message .= '<hr/>';
    $message .= '<h3>Verification Code : ' . $MEMBER->e_verification_code . '</h3>';
    $message .= '<hr/>';
    $message .= '<p>Thanks & Best Regards!.. <br/> www.srilankaproperties.lk<p/>';
    $message .= '<small>*Please do not reply to this email. This is an automated email & you will not receive a response.</small><br/>';
    $message .= '<span>Hotline: +94 77 455 4141 </span><br/>';
    $message .= '<span>Email: help@srilankaproperties.lk</span>';
    $message .= '</div>';
    $message .= '</body>';
    $message .= '</html>';


    // Sending email
    if (mail($to, $subject, $message, $headers)) {

        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'success';
        $response['code'] = $MEMBER->e_verification_code;
        $response['email'] = $MEMBER->email;
        echo json_encode($response);
        exit();
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'error';
        echo json_encode($response);
    }




    if ($result) {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'success';
        $response['code'] = $MEMBER->p_verification_code;
        $response['phone'] = $MEMBER->phone_number;
        echo json_encode($response);
        exit();
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'error';
        echo json_encode($response);
    }
}
