<?php

namespace App\Service;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class LoginService extends BaseService
{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = new UserModel();
        $this->user->protect(false);
    }
    public function hasLoginInfo($requestData){
        $validate = $this->validateLogin($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $param = $requestData->getPost();
        $user = $this->user->where('email', $param['email'])->first();
        if(!$user){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => 'Email chưa được đăng kí!',
            ];
        }
        if(!password_verify($param['password'], $user['password'])){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => 'Mật khẩu không chính xác!',
            ];
        }

        $session = session();
        unset($user['password']);
        $session->set('user_login', $user);
        return [
            'status' => ResultUtils::STATUS_CODE_OK,
            'messageCode' => ResultUtils::MESSAGE_CODE_OK,
            'messages' => null,
        ];
    }
    public function  logOutUser() {
        $session = session();
        $session->destroy();
    }

    private function validateLogin($requestData) {
        $rule = [
            'email' => 'valid_email',
            'password' => 'max_length[30]|min_length[6]',
        ];
        $message = [
            'email' => [
                'valid_email' => 'Email không đúng định dạng. Vui lòng kiểm tra lại!'
            ],
            'password' => [
                'max_length' => 'Mật khẩu không được vượt quá {param} ký tự!',
                'min_length' => 'Mật khẩu không được ít hơn {param} ký tự!'
            ]
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
}