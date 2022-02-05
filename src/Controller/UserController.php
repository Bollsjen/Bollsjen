<?php

namespace App\Controller;

use App\Controller\Controller;

class UserController extends Controller {

    public function execute($param){
        $this->view('user/User', $param);
    }

}