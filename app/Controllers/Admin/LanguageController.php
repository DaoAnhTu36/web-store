<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LanguageController extends BaseController
{
    public function switch($locale)
    {
        $session = session();
        $session->set('site_lang', $locale);
        return redirect()->back();
    }
}
