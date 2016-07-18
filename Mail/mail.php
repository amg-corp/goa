<html>
    <head>
        <title>VCOVS | Mail</title>
    </head>

    <?php
    require_once('class.phpmailer.php');
    require_once('class.smtp.php');

    $feedback = 0;

    $name = "Aritra Mondal";
    $email = "aritram90@gmail.com   ";
    $Phone = 962;
    $plan = "ABC";

    echo "Name: " . $name;
    echo "Email: " . $email;
    echo "Phone: " . $Phone;
    echo "Plan: " . $plan;
    echo "--------------------------------------";
    echo "\n";

    $bodyLline1 = "Name: ". $name;
    $bodyLline2 = "Email: " . $email . "\n";
    $bodyLline3 = "Phone: " . $Phone . "\n";
    $bodyLline4 = "Plan: " . $plan . "\n";


    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
//    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = "sub5.mail.dreamhost.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "payments@frescoalbums.com";
    $mail->Password = "@p1ymenT46";
    $mail->SetFrom("payments@frescoalbums.com");
    $mail->Subject = "Feedback from " . $name;
    $mail->Body = "<h1>Following are the Feedback details: </h1>\\n" . $bodyLline1 . $bodyLline2 . $bodyLline3 . $bodyLline4;
    $mail->AddAddress("aritram90@gmail.com", "Koc Registration 2016");
    $mail->AddAddress("gourab.dalal86@gmail.com", "Gourab Dalal");
//    $mail->AddAddress("aritram90@gmail.com", "Aritra Mondal");
    $mail->AddAddress("gourabmitraonline@gmail.com", "Gourab Mitra");
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
//    header("Location");
    } else {
        echo "Message has been sent";
//        header('Location: ../index1.php');
//    http_redirect("../index1.php",true,HTTP_REDIRECT_PERM);  
        ?>
        <body>
            <script>
//                window.location.href = "../index.html?v=d";
            </script>
        </body>
    </html>
    <?php
}