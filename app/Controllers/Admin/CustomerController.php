<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Libraries\MailService;
use App\Models\EmailTemplateModel;

class CustomerController extends BaseController
{
    protected $model;
    protected $mailService;
    protected $emailTemplateModel;

    public function __construct()
    {
        $this->model = new CustomerModel();
        $this->mailService = new MailService();
        $this->emailTemplateModel = new EmailTemplateModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        $data_view = [
            "title" => "Danh sách khách hàng",
            "data" => $data,
        ];
        return view("admin/customer_view/index_view", $data_view);
    }

    public function create()
    {
        $data_view = [
            "title" => "Thêm mới khách hàng",
        ];
        return view("admin/customer_view/create_view", $data_view);
    }


    public function save()
    {
        $htmlContent = '';
        $filePath = FCPATH . 'template-email/register_successful_template.html'; // Đường dẫn file
        if (file_exists($filePath)) {
            $htmlContent = file_get_contents($filePath);
        }
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $password = $this->request->getPost('password');
        $verification_token = bin2hex(random_bytes(32));
        $data = [
            'first_name'    => $first_name,
            'last_name'    => $last_name,
            'email'   => $email,
            'phone'   => $phone,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'verification_token' => $verification_token,
        ];
        $mess_error = '';
        $check_email = $this->check_email($email);
        if ($check_email['code']) {
            $mess_error = $check_email['is_verified'] == 0 ? 'Tài khoản chưa được kích hoạt' : '';
            return apiResponse(false, 'Email đã tồn tại.' . $mess_error, $check_email, '200');
        }
        $check_phone = $this->check_phone($phone);
        if ($check_phone['code']) {
            $mess_error = $check_phone['is_verified'] == 0 ? 'Tài khoản chưa được kích hoạt' : '';
            return apiResponse(false, 'Số điện thoại đã tồn tại.' . $mess_error, $check_phone, '200');
        }
        $mail_verify_account = $this->emailTemplateModel->where('name', 'mail_verify_account')->first();
        $customer_id = $this->model->insert($data);
        if ($customer_id) {
            $body = $htmlContent;
            $body = str_replace('{{logo}}', "cid:logo_cid", $body);
            $body = str_replace('{{username}}', $first_name . ' ' . $last_name, $body);
            $body = str_replace('{{website_name}}', session()->get('web_configs')['site_name'], $body);
            $body = str_replace('{{verification_link}}', base_url('admin/customer/verify?id=' . $customer_id . '&token=' . $verification_token), $body);
            $subject = $mail_verify_account['subject'];
            $result = $this->mailService->send_mail_mailer($email, $subject, $body);
            if ($result['status'] == false) {
                return apiResponse(true, 'Đăng ký thành công, gửi mail  thất bại. ErrorMessage = ' . $result['message'], null, '200');
            }
            return apiResponse(true, 'Đăng ký thành công. Kiểm tra mail xác nhận để kích hoạt tài khoản.', null, '200');
        }
    }

    private function check_email($email)
    {
        $email = trim($email);
        $item = $this->model->where('email', $email)->first();
        if ($item) {
            return [
                'code' => true,
                'is_verified' => $item['is_verified'],
                'verification_token' => $item['verification_token'],
                'data' => $email,
                'type' => 'email'
            ];
        }
        return [
            'code' => false,
        ];
    }
    private function check_phone($phone)
    {
        $phone = trim($phone);
        $item = $this->model->where('phone', $phone)->first();
        if ($item) {
            return [
                'code' => true,
                'is_verified' => $item['is_verified'],
                'verification_token' => $item['verification_token'],
                'data' => $phone,
                'type' => 'phone'
            ];
        }
        return [
            'code' => false,
        ];
    }

    public function verify()
    {
        $id = $this->request->getGet('id');
        $token = $this->request->getGet('token');
        $check_exist = $this->model
            ->where('id', $id)
            ->where('verification_token', $token)
            ->first();
        if ($check_exist) {
            $data_update = [
                'is_verified' => 1
            ];
            $this->model->update($id, $data_update);
            return redirect()->to('')->with('success', 'Xác thực thành công. Bắt đầu trải nghiệm dịch vụ mua hàng');
        }
        return view('portal/error_view');
    }

    public function verify_from_portal()
    {
        $type = $this->request->getPost('type');
        $data = $this->request->getPost('data');
        $verification_token = $this->request->getPost('verification_token');
        $check_exist = $this->model
            ->where('verification_token', $verification_token);
        if ($type == 'email') {
            $check_exist = $check_exist->where('email', $data)->first();
        }
        if ($type == 'phone') {
            $check_exist = $check_exist->where('phone', $data)->first();
        }
        if ($check_exist) {
            $data_update = [
                'is_verified' => 1
            ];
            $query = $this->model->update($check_exist['id'], $data_update);
            if ($query) {
                return apiResponse(true, 'Kích hoạt thành công.', null, '200');
            }
        }
        return apiResponse(false, 'Kích hoạt thất bại.', null, '200');
    }

    public function sign_in()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->model
            ->where('email', $username)
            ->orWhere('phone', $username)
            ->first();
        if ($user && password_verify($password, $user['password_hash'])) {
            $customer_info = [
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'address' => $user['address'],
                'city' => $user['city'],
                'state' => $user['state'],
                'country' => $user['country'],
                'postal_code' => $user['postal_code'],
                'date_of_birth' => $user['date_of_birth'],
                'gender' => $user['gender'],
                'profile_picture' => $user['profile_picture'],
            ];
            session()->set([
                'customer_is_logged_in' => $customer_info,
            ]);
            return apiResponse(true, 'Đăng nhập thành công', null, '200');
        } else {
            return apiResponse(false, 'Thông tin đăng nhập không chính xác', null, '200');
        }
    }

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
