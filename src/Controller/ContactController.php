<?php

namespace App\Controller;

use App\Controller\Controller;

class ContactController extends Controller {
    public function execute(array $params = []){
        $this->view('contact/Contact', $params);
    }

    public function post($params){
        var_dump($params);
    }
}