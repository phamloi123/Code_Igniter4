<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Service\MenuService;
use App\Service\ProductsService;
use App\Service\CategoryService;

class HomeController extends BaseController
{
    /**
     * @var menu
     */
    private $menu;
    private $category;
    private $products;
    public function __construct()
    {
        $this->menu = new MenuService();
        $this->category = new CategoryService();
        $this->products = new ProductsService();
    }
    public function index(): string
    {
        $data = [];
        $dataLayout['menu'] = $this->menu->getAllMenu();
        $dataLayout['category'] = $this->category->getAllCategory();
        $dataLayout['proByDate'] = $this->products->getProductsByDate();
        $dataLayout['proBySold'] = $this->products->getProductsBySold();
        $data = $this->loadMasterLayoutUser($data, "Katty's Campus | Trang chủ", 'user/pages/home',$dataLayout );
        return view('user/main', $data);
    }
    public function shopping()
    {
        $data = [];
        $dataLayout['menu'] = $this->menu->getAllMenu();
        $dataLayout['category'] = $this->category->getAllCategory();
        $dataLayout['products'] = $this->products->getProductsForPaginate();
        $dataLayout['pager'] = $this->products->getPager();
        // dd($dataLayout['pager']);
        $data = $this->loadMasterLayoutUser($data, "Katty's Campus | Shopping", 'user/pages/shopping',$dataLayout );
        return view('user/main', $data);
    }
}
