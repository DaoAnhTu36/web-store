<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class AccountController extends BaseController
{
    protected $accountModel;

    public function __construct()
    {
        helper("common");
        $this->accountModel = new AccountModel();
    }

    public function customerList()
    {
        $data = $this->accountModel->getAllAccountByRole("customer");
        $data_view = [
            "title" => "Danh sách người dùng",
            "data" => $data,
        ];

        return view("admin/account_view/customer_list_view", $data_view);
    }
    public function administratorList()
    {
        $data = $this->accountModel->getAllAccountByRole("admin");
        $data_view = [
            "title" => "Danh sách quản trị viên",
            "data" => $data,
        ];

        return view("admin/account_view/administrator_list_view", $data_view);
    }

    public function create()
    {
        $data_view = [
            "title" => "Thêm mới người dùng",
        ];

        return view("admin/account_view/create_view", $data_view);
    }

    public function save()
    {
        try {
            $data = [
                "full_name" => $this->request->getPost('full_name'),
                "user_name" => $this->request->getPost('user_name'),
                "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                "email" => $this->request->getPost('email'),
                "phone" => $this->request->getPost('phone'),
                "address" => $this->request->getPost('address'),
                "role" => $this->request->getPost('role'),
            ];
            $this->accountModel->save($data);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Thêm mới người dùng thành công',
            ]);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => $th->getMessage(),
            ]);
        }
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
        $user = $this->accountModel->where('user_name', $user_name)->where('role', 'admin')->first();
        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set([
                'is_logged_in' => true,
                'user_name' => $user['user_name'],
                'user_id' => $user['id'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'address' => $user['address'],
                'role' => $user['role'],
                'full_name' => $user['full_name'],
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
        $data = $this->accountModel->where('id', $id)->first();
        $data_view = [
            'title' => 'Thông tin chi tiết',
            'data' => $data,
        ];
        return view('admin/account_view/detail_view', $data_view);
    }

    public function update()
    {
        try {
            $id = $this->request->getPost('id');
            $data = [
                "full_name" => $this->request->getPost('full_name'),
                "user_name" => $this->request->getPost('user_name'),
                "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                "email" => $this->request->getPost('email'),
                "phone" => $this->request->getPost('phone'),
                "address" => $this->request->getPost('address'),
                "role" => $this->request->getPost('role'),
            ];
            $this->accountModel->update($id, $data);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Cập nhật thông tin người dùng thành công',
            ]);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => $th->getMessage(),
            ]);
        }
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
