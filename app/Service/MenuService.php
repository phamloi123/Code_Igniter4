<?php

namespace App\Service;

use App\Models\MenuModel;
use App\Models\CategoryModel;
use Exception;

class MenuService extends BaseService
{
    private $menu;
    private $category;
    function __construct()
    {
        parent::__construct();
        $this->menu = new MenuModel();
        $this->menu->protect(false);
        $this->category = new CategoryModel();
        $this->category->protect(false);
    }

    //LẤY LOẠI CỦA SẢN PHẨM TRONG BẢNG MENU ĐỂ ĐƯA VÀO META TRONG BẢNG PRODUCTS
    public function getMeta($idCate)
    {
        //LẤY PARENT TRONG BẢNG CATEGORY
        $get_parent_cate = $this->category->select('parent')->where('id', $idCate)->get();
        if ($get_parent_cate->getNumRows() > 0) {
            $row = $get_parent_cate->getRow();
            $id_menu = $row->parent;
        } else {
            return null;
        }

        //LẤY META TRONG BẢNG MENU
        $get_meta_menu = $this->menu->select('meta')->where('id', $id_menu)->get();
        if ($get_meta_menu->getNumRows() > 0) {
            $row = $get_meta_menu->getRow();
            $meta_in_menu_table = $row->meta;
        } else {
            return null;
        }

        //CẮT CHUỖI ĐỂ LẤY META
        $cut_meta = explode('/', $meta_in_menu_table);
        $meta = end($cut_meta); // Lấy phần tử cuối cùng của mảng
        return $meta;
    }
    public function getAllMenu(){
        return $this->menu->findAll();
    }
}
