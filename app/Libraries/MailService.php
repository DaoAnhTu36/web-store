<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public function send_mail_mailer($to, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = session()->get('web_configs')['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = session()->get('web_configs')['admin_email'];
            $mail->Password   = session()->get('web_configs')['smtp_password'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = session()->get('web_configs')['smtp_port'];
            try {
                $aray_logo = explode('/', session()->get('web_configs')['banner_mail_logo']);
                $imagePath = FCPATH . 'uploads/' . $aray_logo[count($aray_logo) - 1];
                $mail->addEmbeddedImage($imagePath, 'logo_cid');
            } catch (\Throwable $th) {
            }
            $mail->setFrom(session()->get('web_configs')['admin_email'], session()->get('web_configs')['site_name']);
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->Body    = html_entity_decode($message);
            $result = $mail->send();
            return [
                'result' => $result,
                'status' => true,
                'message' => ''
            ];
        } catch (\Throwable $th) {
            return [
                'result' => '',
                'status' => false,
                'message' => $mail->ErrorInfo . ' => ' . $th->getMessage()
            ];
        }
    }
}
