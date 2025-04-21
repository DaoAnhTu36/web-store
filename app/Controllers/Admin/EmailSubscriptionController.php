<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\MailService;
use App\Models\EmailSubscriptionModel;
use App\Models\EmailTemplateModel;

class EmailSubscriptionController extends BaseController
{
    protected $model;
    protected $serviceMail;
    protected $emailTemplateModel;

    public function __construct()
    {
        $this->serviceMail = new MailService();
        $this->model = new EmailSubscriptionModel();
        $this->emailTemplateModel = new EmailTemplateModel();
    }

    public function index() {}

    public function subscription()
    {
        $email_subscription = $this->request->getPost('email_subscription');
        $data = [
            'email' => $email_subscription,
            'subscription_date' => date('Y-m-d H:i:s'),
        ];
        try {
            if ($this->model->save($data)) {
                $filePath = FCPATH . 'template-email/subscription_successful_template.html';
                if (file_exists($filePath)) {
                    $htmlContent = file_get_contents($filePath);
                    $mail_config = $this->emailTemplateModel->where('name', 'mail_subscription_successful')->first();
                    $body = $htmlContent;
                    $body = str_replace('{{logo}}', "cid:logo_cid", $body);
                    $body = str_replace('{{website_name}}', session()->get('web_configs')['site_name'], $body);
                    $subject = $mail_config['subject'];
                    $this->serviceMail->send_mail_mailer($email_subscription, $subject, $body);
                }
                return apiResponse(200, 'Đăng ký nhận thông tin thành công!');
            } else {
                return apiResponse(400, 'Đăng ký nhận thông tin thất bại!');
            }
        } catch (\Throwable $th) {
            return apiResponse(500, 'Đăng ký nhận thông tin thất bại!');
        }
    }

    public function save() {}
}
