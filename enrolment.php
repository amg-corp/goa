<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('Mail/class.phpmailer.php');
require_once('Mail/class.smtp.php');

$servername = "localhost";
$username = "kocusr";
$password = "Koc@2016";
$dbname = "goa_register";

if (!empty($_POST)) {
    $name = $_POST["firstname"];
    $add = $_POST["PostalAddress"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $institueName = $_POST["institueName"];
    $board = $_POST["board"];
    $grad = $_POST["grad"];
    $gradboard = $_POST["gradboard"];
    $Workplace = $_POST["Workplace"];
    $Blood = $_POST["Blood"];
    $receipt = $_POST["receipt"];
    $Image = $_POST["Image"];

//    // Create connection
    $conn = mysql_connect($servername, $username, $password, $dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    mysql_select_db('mydb');

    $sql = "INSERT INTO `goa_register`.`enroll` (`first_name`, `last_name`, `address`, `dob`, `gender`, `blood_grp`, `basic_deg`, `graduation_deg`, `board_name`, `university_name`, `work_at`, `is_del`, `is_approved`) "
            . "VALUES ('" . $name . "', 'n/a', '" . $add . "', '" . $dob . "', '" . $gender . "', '" . $Blood . "', '" . $institueName . "', '" . $grad . "', '" . $board . "', '" . $gradboard . "', '" . $Workplace . "', '0', '0');";

    mysql_query($sql);

    $conid = mysql_insert_id();

    echo $conid;

    if (!($conid > 0)) {
        echo "No Data";
        exit();
    }

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
    $mail->Body = "<p>Hi " . $name . ",</p><p>You have been registrated succesfully.</p><p>Regards,</p><p>Graduate Optometrist Team</p>";
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
        <meta http-equiv="Location" content="http://graduateoptometrists.com">
    </head>
    <body></body>
</html>
