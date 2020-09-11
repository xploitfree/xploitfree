<?php

    require_once "./vendor/autoload.php";
    use \PHPMailer\PHPMailer\PHPMailer;
    use \PHPMailer\PHPMailer\Exception;

    function send_mail($customer_email, $subject, $message){

        $mail = new PHPMailer(TRUE);

        $mail->setFrom('xploitfree@gmail.com', 'Xploitfree Team');
        $mail->clearReplyTos();
        // $mail->addReplyto('18bcs054@smvdu.ac.in', 'Puneet Saraswat');
        $mail->addAddress($customer_email);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'xploitfree@gmail.com';
        $mail->Password = 'hcgrprhhthbyiyfq';  
         
        try {
            $mail->send();
            return true;
        }
        catch (Exception $e)
        {
           return false;
        }
    };

?>