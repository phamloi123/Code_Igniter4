<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Service\UserService;

class UserController extends BaseController
{
    /**
     * @var Service
     */
    private $Service;
    public function __construct()
    {
        $this->Service = new UserService();
    }
    public function list()
    {
        $data = [];
        $dataLayout['users'] = $this->Service->getAllUser();
        $cssFiles = [
            'assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'
        ];
        $jsFiles = [
            base_url().'assets/admin/js/event.js',
            'assets/admin/vendor/datatables/jquery.dataTables.min.js',
            'assets/admin/vendor/datatables/dataTables.bootstrap4.min.js',
            'assets/admin/js/datatable.js'
        ];
        $data = $this->loadMasterLayout($data, 'Admin | Danh sách', 'admin/pages/user/list', $dataLayout ,$cssFiles, $jsFiles);
        return view('admin/main', $data);
    }
    public function add(){
        $data = [];
        $data = $this->loadMasterLayout($data, 'Admin | Thêm mới', 'admin/pages/user/add');
        return view('admin/main', $data);
    }
    public function create(){
        $result = $this->Service->addUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }
    public function edit($id){
        $user = $this->Service->getUserByID($id);
        if (!$user){
            return redirect('error/404');
        }
        $data = [];
        $dataLayout['user'] = $user;
        $jsFiles= [
            base_url().'assets/admin/js/event.js'
        ];
        $data = $this->loadMasterLayout($data, 'Admin | Chỉnh sửa', 'admin/pages/user/edit', $dataLayout,[],$jsFiles);
        return view('admin/main', $data);
    }
    public function update(){
        $result = $this->Service->updateUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }
    public function delete($id){
        $user = $this->Service->getUserByID($id);
        if (!$user){
            return redirect('error/404');
        }
        $result = $this->Service->deleteUser($id);
        return redirect('admin/user/list')->with($result['messageCode'], $result['messages']);
    }
}
