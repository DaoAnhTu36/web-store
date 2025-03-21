<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RouteModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            "controller" => "Dashboard",
            "method" => "Index",
            "title" => "Bảng điều khiển"
        ];
        return view('admin/dashboard_view/index_view', $data);
    }
}
