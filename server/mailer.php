<?php
include('PHPMailer/PHPMailer/PHPMailerAutoload.php');
function smtpmailer($to,$subject, $body)
{
    global $site_email, $sitename, $siteemailpassword, $emailhost;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'ssl';                    
    $mail->Host = "mail.vgsbo.com";               
    $mail->Port = 465;                             
    $mail->Username = $site_email; // SMTP username   
    $mail->Password = $siteemailpassword; // SMTP password     

    $mail->IsHTML(true);
    $mail->From = $site_email;                           
    $mail->FromName = $sitename;
    $mail->Sender = $site_email;
    $mail->AddReplyTo($site_email, $sitename);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);

    if(!$mail->Send()) {
        // Return detailed error message
        return 'Mailer Error: ' . $mail->ErrorInfo;
    }

    return true;  // Sending successful
}
?>

