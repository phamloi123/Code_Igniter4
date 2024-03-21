<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
}
