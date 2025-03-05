<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('portal/home_view');
    }
}
