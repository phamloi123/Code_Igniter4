<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data = $this->loadMasterLayout($data, 'Admin | Trang chủ', 'admin/pages/home' );
        return view('admin/main', $data);
    }
}
