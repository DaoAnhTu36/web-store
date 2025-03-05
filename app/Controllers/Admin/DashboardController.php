<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            "controller" => "Dashboard",
            "method" => "Index",
        ];
        return view('admin/dashboard_view/index_view', $data);
    }
}
