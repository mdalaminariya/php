<?php

include '../../config/database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../src/PHPMailer.php';
require '../../src/SMTP.php';
require '../../src/Exception.php';

if(isset($_POST['email_sender'])){

    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_body = $_POST['body'];

    if($sender_name && $sender_email && $sender_body){
        
        $mail = new PHPMailer(true);
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'alaminariya7@gmail.com';                     //SMTP username
                    $mail->Password   = 'mjuypmhfvpkpjqio';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($mail->Username, 'MD.Alamin M IAWD 2403');
                    $mail->addAddress($sender_email, $sender_name);     //Add a recipient            //Name is optional
                    $mail->addReplyTo($mail->Username);
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Welcome to our comunity.!';
                    $mail->Body    = "Thank you for your valuable opinion.! <br> Reguards <br> $sender_name";

                    if($mail->send()){
                        $insert = "INSERT INTO `emails`(`name`,`email`,`body`) VALUES ('$sender_name','$sender_email','$sender_body')";
                        mysqli_query($db,$insert);
                        header("location: ../../index.php#contact");
                    }
    }
}

?>