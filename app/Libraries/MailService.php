<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public function send_mail_mailer($to, $subject, $message)
    {
        require_once APPPATH . '../vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = session()->get('web_configs')['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = session()->get('web_configs')['admin_email'];
            $mail->Password   = session()->get('web_configs')['smtp_password'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = session()->get('web_configs')['smtp_port'];
            $mail->setFrom(session()->get('web_configs')['admin_email'], session()->get('web_configs')['site_name']);
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->Body    = html_entity_decode($message);
            return $mail->send();
        } catch (Exception $e) {
            return "Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
