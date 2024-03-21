<?php

namespace App\Service;

use App\Models\CategoryModel;
class CategoryService extends BaseService
{
    private $category;
    function __construct()
    {
        parent::__construct();
        $this->category = new CategoryModel();
        // $this->category->protect(false);
    }
    public function getAllCategory(){
        return $this->category->findAll();
    }
}
