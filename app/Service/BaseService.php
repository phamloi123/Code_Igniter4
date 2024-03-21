<?php

namespace App\Service;

class BaseService
{
    /**
     * @var validation
     */
    public $validation;
    function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
}
