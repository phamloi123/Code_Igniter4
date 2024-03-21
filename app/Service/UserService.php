<?php

namespace App\Service;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService
{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = new UserModel();
        $this->user->protect(false);
    }
    public function getAllUser(){
        return $this->user->findAll();
    }
    public function addUserInfo($requestData){
        $validate = $this->validateAddUser($requestData);
        if ($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        unset($dataSave['repeatPassword']);
        $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
        try{
            $this->user->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => [
                    'success' => 'Thêm dữ liệu thành công!'
                ],
            ];
        }
        catch(Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => [
                    'error' => $e->getMessage() 
                ],
            ];
        }
    }
    private function validateAddUser($requestData){
        $rule = [
            'email' => 'valid_email|is_unique[user.email]',
            'name' => 'max_length[30]|min_length[6]',
            'password' => 'max_length[30]|min_length[6]',
            'repeatPassword' => 'matches[password]',
        ];
        $message = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} không đúng định dạng!',
                'is_unique' => 'Email đã được đăng kí. Vui lòng chọn Email khác!'
            ],
            'name' => [
                'max_length' => 'Tên không được dài quá {param} kí tự!',
                'min_length' => 'Tên phải nhiều hơn {param} kí tự!'
            ],
            'password' => [
                'max_length' => 'Mật khẩu không được dài quá {param} kí tự!',
                'min_length' => 'Mật khẩu phải nhiều hơn {param} kí tự!'
            ],
            'repeatPassword' => [
                'matches' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại!'
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
    public function getUserByID($id){
        return $this->user->where('id', $id)->first();
    }
    public function updateUserInfo($requestData){
        $validate = $this->validateUpdateUser($requestData);
        if ($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        if(isset($requestData->getPost()['change_password'])){
            unset($dataSave['change_password']);
            unset($dataSave['repeatPassword']);
            $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
        }
        else{
            unset($dataSave['password']);
            unset($dataSave['repeatPassword']);
        }
        $this->user->save($dataSave);
        try{
            $this->user->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => [
                    'success' => 'Cập nhật dữ liệu thành công!'
                ],
            ];
        }
        catch(Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => [
                    'error' => $e->getMessage() 
                ],
            ];
        }
    }
    private function validateUpdateUser($requestData){
        $rule = [
            'email' => 'valid_email|is_unique[user.email, id,'.$requestData->getPost()['id'].']',
            'name' => 'max_length[30]|min_length[6]',
        ];
        $message = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} không đúng định dạng!',
                'is_unique' => 'Email đã được đăng kí. Vui lòng chọn Email khác!'
            ],
            'name' => [
                'max_length' => 'Tên không được dài quá {param} kí tự!',
                'min_length' => 'Tên phải nhiều hơn {param} kí tự!'
            ],
        ];
        if(isset($requestData->getPost()['change_password'])){
            $rule['password'] = 'max_length[30]|min_length[6]';
            $rule['repeatPassword'] = 'matches[password]';
            $message['password'] = [
                'max_length' => 'Mật khẩu không được dài quá 30 kí tự!',
                'min_length' => 'Mật khẩu tối thiểu phải có 6 kí tự!'
            ];
            $message['repeatPassword'] = [
                'matches' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại!'
            ];
        }
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
    public function deleteUser($id){
        try{
            $this->user->delete($id);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => [
                    'success' => 'Cập nhật dữ liệu thành công!'
                ],
            ];
        }
        catch(Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => [
                    'error' => $e->getMessage() 
                ],
            ];
        }
    }
}
