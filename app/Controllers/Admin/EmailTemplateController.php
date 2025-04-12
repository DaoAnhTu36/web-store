<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EmailTemplateModel;
use App\Libraries\MailService;

class EmailTemplateController extends BaseController
{
    protected $model;
    protected $serviceMail;

    public function __construct()
    {
        $this->model = new EmailTemplateModel();
        $this->serviceMail = new MailService();
    }

    public function index()
    {
        $data =  $this->model->findAll();
        $data_view = [
            "title" => "Danh sách template email",
            "data" => $data,
        ];
        return view("admin/email_template_view/index_view", $data_view);
    }

    public function create()
    {
        $data_view = [
            "title" => "Thêm mới template email",
        ];
        return view("admin/email_template_view/create_view", $data_view);
    }

    public function save()
    {
        $data = [
            'name'    => $this->request->getPost('name'),
            'body'   => $this->request->getPost('body'),
            'subject'   => $this->request->getPost('subject'),
            'body' => $this->request->getPost('body'),
            'created_by' => session()->get('user_id'),
        ];
        $this->model->save($data);
        return redirect()->to('admin/email-template')->with('success', 'Thêm mới thành công');
    }

    public function detail($id)
    {
        $data = $this->model->find($id);
        $data_view = [
            "title" => "Chi tiết template email",
            "data" => $data,
        ];
        return view("admin/email_template_view/update_view", $data_view);
    }

    public function update($id)
    {
        $data = [
            'name'    => $this->request->getPost('name'),
            'body'   => $this->request->getPost('body'),
            'subject'   => $this->request->getPost('subject'),
            'body' => $this->request->getPost('body'),
            'updated_by' => session()->get('user_id'),
        ];
        $this->model->update($id, $data);
        return redirect()->to('admin/email-template')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('admin/email-template')->with('success', 'Xóa thành công');
    }

    public function sendMail()
    {
        $email = $this->request->getPost('email');
        $template = $this->model->first();
        $this->serviceMail->send_mail_mailer($email, $template['subject'], $template['body']);
        return apiResponse(true, 'Gửi mail thành công', null, 200);
    }
}
