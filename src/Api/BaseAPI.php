<?php

namespace App\Api;

class BaseAPI {

    public function __construct()
    {
        header("Content-Type: application/json; charset=utf-8");
    }

}