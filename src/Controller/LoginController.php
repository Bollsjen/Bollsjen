<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Session\LoginSession;

class LoginController extends Controller {
    public function execute(array $params = []){
        $this->view('login/login', $params);
    }

    public function post($params){
        if($params['username'] == "admin" && $params['password'] == "1234"){
            LoginSession::setSession(array("login_ID" => "admin"));
            header("Location: /admin");
        }else{
            $this->view('login/login', $params);
        }
    }

    public function logout(){
        LoginSession::destroySession();
        header("Location: /");
    }
}