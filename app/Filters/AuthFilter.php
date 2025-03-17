<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AccountModel;

class AuthFilter implements FilterInterface
{
    protected $accountModel;
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //
        $session = session();
        helper('cookie');
        $this->accountModel = new AccountModel();

        // Check if user is logged in
        if (!$session->get('is_logged_in')) {
            // Redirect to login page
            // $rememberToken = get_cookie('remember_token');
            // if ($rememberToken) {
            //     // Giả sử bạn check lại user theo token (hoặc user id)
            //     $user = $this->accountModel->find($rememberToken);
            //     if ($user) {
            //         // Set lại session
            //         $session->set([
            //             'is_logged_in' => true,
            //             'user_name' => $user['user_name'],
            //             'user_id' => $user['id'],
            //             'email' => $user['email'],
            //             'phone' => $user['phone'],
            //             'address' => $user['address'],
            //             'role' => $user['role'],
            //             'full_name' => $user['full_name'],
            //         ]);
            //     } else {
            //         return redirect()->to('admin/account/login');
            //     }
            // } else {
            //     return redirect()->to('admin/account/login');
            // }
            return redirect()->to('admin/account/login');
        }

        // Nếu đã login, cho phép đi tiếp
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
