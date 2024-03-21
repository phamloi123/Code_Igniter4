<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Service\LoginService;
use App\Common\ResultUtils;

class LoginController extends BaseController
{
    /**
     * @var login
     */
    private $login;
    public function __construct()
    {
        $this->login = new LoginService();
    }
    public function index()
    {
        if(session()->has('user_login')){
            return redirect('admin/home');
        }
        return view('login');
    }
    public function login()
    {
        $result = $this->login->hasLoginInfo($this->request);
        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return redirect('admin/home');
        }elseif($result['status'] === ResultUtils::STATUS_CODE_ERR){
            return redirect('login')->with($result['messageCode'], $result['messages']);
        }
        return redirect('/');
    }
    public function logout(){
        $this->login->logOutUser();
        return redirect('/');
    }
}
