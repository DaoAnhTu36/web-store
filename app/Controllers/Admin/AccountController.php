<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\RoleModel;

class AccountController extends BaseController
{
    protected $accountModel;
    protected $roleModel;

    public function __construct()
    {
        $this->accountModel = new AccountModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $data = $this->accountModel->orderBy('created_at', 'desc')->findAll();
        $data_view = [
            "title" => "Danh sách quản trị viên",
            "data" => $data,
        ];

        return view("admin/account_view/index_view", $data_view);
    }

    public function create()
    {
        $roles = $this->roleModel->where('is_active', 1)->findAll();
        $data_view = [
            "title" => "Thêm quản trị viên mới",
            "roles" => $roles,
        ];

        return view("admin/account_view/create_view", $data_view);
    }

    public function save()
    {
        $rules = $this->accountModel->validationRules;
        $messages = $this->accountModel->validationMessages;

        if (!$this->validate($rules, $messages)) {
            session()->setFlashdata("errors", $this->validator->getErrors());
            return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
        }

        $data = [
            "full_name" => $this->request->getPost('full_name'),
            "user_name" => $this->request->getPost('user_name'),
            "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            "email" => $this->request->getPost('email'),
            "phone" => $this->request->getPost('phone'),
            "address" => $this->request->getPost('address'),
            "role_id" => $this->request->getPost('role_id'),
        ];
        $this->accountModel->save($data);
        return apiResponse(message: 'Thêm mới quản trị viên thành công');
    }

    public function login()
    {
        return view('admin/account_view/login_view');
    }

    public function logout()
    {
        session()->destroy();
        delete_cookie('remember_token');
        return redirect()->to('admin/account/login');
    }

    public function signIn()
    {
        $remember = $this->request->getPost('remember');
        $user_name = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');
        $user = $this->accountModel->where('user_name', $user_name)->first();
        if ($user && password_verify($password, $user['password'])) {
            $roleInfo = $this->roleModel->where('id', $user['role_id'])->first();
            $session = session();
            $session->set([
                'is_logged_in' => true,
                'user_name' => $user['user_name'],
                'user_id' => $user['id'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'address' => $user['address'],
                'role_id' => $user['role_id'],
                'full_name' => $user['full_name'],
                'role_name' => $roleInfo['name'],
            ]);

            if ($remember) {
                helper('cookie');
                set_cookie('remember_token', $user['id'], 60 * 60 * 24 * 30); // 30 ngày
            }

            return redirect()->to('admin/dashboard');
        } else {
            return redirect()->back()->with('errors', 'Thông tin đăng nhập sai. Hãy thử lại!');
        }
    }

    public function detail($id)
    {
        $roles = $this->roleModel->where('is_active', 1)->findAll();
        $data = $this->accountModel->where('id', $id)->first();
        $data_view = [
            'title' => 'Thông tin chi tiết quản trị viên',
            'data' => $data,
            'roles' => $roles,
        ];
        return view('admin/account_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $rules = $this->accountModel->validationRules;
        $messages = $this->accountModel->validationMessages;

        if (!$this->validate($rules, $messages)) {
            return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
        }

        $data = [
            "full_name" => $this->request->getPost('full_name'),
            "user_name" => $this->request->getPost('user_name'),
            "email" => $this->request->getPost('email'),
            "phone" => $this->request->getPost('phone'),
            "address" => $this->request->getPost('address'),
            "role_id" => $this->request->getPost('role_id'),
        ];
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }
        $this->accountModel->update($id, $data);
        return apiResponse(message: 'Cập nhật thông tin quản trị viên thành công');
    }

    public function delete($id)
    {
        if ($this->accountModel->delete($id)) {
            return redirect()->back()->with('success', 'Xóa thành công!');
        } else {
            return redirect()->back()->with('errors', 'Xóa thất bại');
        }
    }
}
