<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('Mail/class.phpmailer.php');
require_once('Mail/class.smtp.php');

$servername = "https://sg2plcpnl0094.prod.sin2.secureserver.net:2083";
$username = "kocusr";
$password = "Koc@2016";
$dbname = "goa_register";

if (!empty($_POST)) {
    $name = $_POST["firstname"];
    $add = $_POST["PostalAddress"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $school = $_POST["school"];
    $certificate = $_POST["certificate"];
    $college = $_POST["college"];
    $grad_certificate = $_POST["grad_certificate"];
    $email = $_POST["Email"];
    $mobile = $_POST["mobile"];
    $receipt = $_POST["receipt"];
    $picture = $_POST["picture"];

//    print_r($_FILES);
//    
//    echo "<br>";
    // Create connection
    $conn = mysql_connect($servername, $username, $password, $dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    mysql_select_db('mydb');

    $sql = "INSERT INTO `goa_register`.`enroll` (`first_name`,`address`, `dob`, `gender`, `mobile`, `college_deg`, `optm_deg`, `board_name`, `college_name`, `optm_name`, `email_add`,`is_del`, `is_approved,`picture`,`money_receipt`) "
            . "VALUES ('" . $name . "'," . $add . "', '" . $dob . "', '" . $gender . "', '" . $mobile . "', '" . $certificate . "', '" . $grad_certificate . "', '" . $school . "', '" . $college . "', '" . $email . "', '0', '0'," . $picture . "," . $receipt . ");";

    mysql_query($sql);

    $conid = mysql_insert_id();

    echo $conid;

    if (!($conid > 0)) {
        echo "No Data";
        exit();
    }

    $body = "<style>

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-user-select: none;
}

.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}
</style>

<h4>Hi President,<h4>

<h4>New Registrant has applied:</h4>

<ul>

    <li> Name: " . $name . "</li> 
    <li> Address: " . $add . "</li>
    <li> Mobile: " . $mobile . "</li>
    <li> Email: " . $email . "</li>
    <li> Date of Birth: " . $dob . "</li>
    <li> Gender: " . $gender . "</li>
    <li> (10+2) school/college: " . $school . "</li>
    <li> (10+2) certificate attach " . $certificate . "</li>
    <li> B.Optm college: " . $college . "</li>
    <li> B.Optm certificate attach: " . $grad_certificate . "</li>
    <li> Pic attach: " . $picture . "</li>
    <li> Money receipt attach: " . $receipt . "</li>
</ul>

<a type='button' class='btn btn-success' href='http://graduateoptometrists.com/success.php?id=" . $conid . "' style='color: green;font-size: 30px;text-decoration: none;'>Approve</a> 
<a type='button' class='btn btn-danger' href='http://graduateoptometrists.com/fail.php?id=" . $conid . "' style='color: red;font-size: 30px;text-decoration: none;'>Reject</a> 

<h4>Regards,</h4>
<h5>GOA Team</h5>
<sup><sup>*</sup> This is auto generated mail. Please do not reply</sup>";

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = "sg2plcpnl0094.prod.sin2.secureserver.net";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "enroll@graduateoptometrists.com";
    $mail->Password = "Radmin123";
    $mail->SetFrom("registration@koc2016.in");
    $mail->Subject = "Registration Confirmation for " . $name;
    $mail->Body = $body;
    $mail->AddAddress("goanewmem@gmail.com", "GOA New Member");
    $mail->AddAddress("aritram90@gmail.com", "Aritra Mondal");
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit();
    }
}
php
?>

<html>
    <head>        
        <title> KOC2016 | Success</title>
        <meta http-equiv="refresh" content="1; URL='http://graduateoptometrists.com'">
    </head>
    <body onload="alert('Registration Successfull');"></body>
</html>
