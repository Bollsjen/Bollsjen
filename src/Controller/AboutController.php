<?php

namespace App\Controller;

use App\Controller\Controller;

class AboutController extends Controller {
    public function execute(array $params = []){
        $this->view('about/About', $params);
    }

    public function post($params){
        var_dump($params);
    }
}