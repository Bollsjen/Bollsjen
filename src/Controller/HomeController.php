<?php

namespace App\Controller;

use App\Controller\Controller;

class HomeController extends Controller {
    public function execute(array $params = []){
        $this->view('Home', $params);
    }

    public function post($params){
        var_dump($params);
    }
}