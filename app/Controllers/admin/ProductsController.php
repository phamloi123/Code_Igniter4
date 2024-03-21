<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Service\ProductsService;
use App\Service\CategoryService;
class ProductsController extends BaseController
{
    /**
     * @var Service
     */
    private $products;
    private $category;
    public function __construct()
    {
        $this->products = new ProductsService();
        $this->category = new CategoryService();
    }
    public function list()
    {
        $data = [];
        $dataLayout['products'] = $this->products->getAllProducts();
        $cssFiles = [
            'assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'
        ];
        $jsFiles = [
            base_url().'assets/admin/js/event.js',
            'assets/admin/vendor/datatables/jquery.dataTables.min.js',
            'assets/admin/vendor/datatables/dataTables.bootstrap4.min.js',
            'assets/admin/js/datatable.js'
        ];
        $data = $this->loadMasterLayout($data, 'Admin | Products list', 'admin/pages/products/list', $dataLayout ,$cssFiles, $jsFiles);
        return view('admin/main', $data);
    }
    public function edit($id){
        $products = $this->products->getProductsByID($id);
        $category = $this->category->getAllCategory();
        if (!$products){
            return redirect('error/404');
        }
        $jsFiles = [
            base_url().'assets/admin/js/event.js'
        ];
        $data = [];
        $dataLayout['products'] = $products;
        $dataLayout['category'] = $category;
        // dd($dataLayout['category']);
        $data = $this->loadMasterLayout($data, 'Admin | Products edit', 'admin/pages/products/edit', $dataLayout,[], $jsFiles);
        return view('admin/main', $data);
    }
    public function update(){
        $result = $this->products->updateProInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }

    public function delete($id){
        $products = $this->products->getProductsByID($id);
        if (!$products){
            return redirect('error/404');
        }   
        $result = $this->products->deleteProduct($id);
        return redirect('admin/products/list')->with($result['messageCode'], $result['messages']);
    }
    public function add()
    {
        $data = [];
        $jsFiles = [
            base_url().'assets/admin/js/event.js'
        ];
        $dataLayout['category'] = $this->category->getAllCategory();
        $data = $this->loadMasterLayout($data, 'Admin | Products add', 'admin/pages/products/add', $dataLayout, [], $jsFiles);
        return view('admin/main', $data);
    }
    public function create(){
        $result = $this->products->addProductsInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }
}
