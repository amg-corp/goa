<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Registration Success Mail

require_once('Mail/class.phpmailer.php');
require_once('Mail/class.smtp.php');

if (!empty($_POST)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sub = $_POST["sub"];
    $msg = $_POST["msg"];

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = "sg2plcpnl0094.prod.sin2.secureserver.net";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "registration@graduateoptometrists.com";
    $mail->Password = "Register@1234";
    $mail->SetFrom("registration@graduateoptometrists.com");
    $mail->Subject = "Registration for " . $sub;
    $mail->Body = "<p>Hi " . $name . ",</p><p>You have been registrated succesfully.</p><p>Regards,</p><p>Graduate Optometrist Team</p>";
    $mail->AddAddress($email, $name);
//    $mail->AddAddress("gourab.dalal86@gmail.com", "Gourab Dalal");
//    $mail->AddAddress("gourabmitraonline@gmail.com", "Gourab Mitra");

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        http_response_code(404);
        exit();
    } else {
        echo "Done";
    }
} else {
    http_response_code(404);
}
