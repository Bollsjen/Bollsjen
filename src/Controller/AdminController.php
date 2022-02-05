<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Session\LoginSession;

class AdminController extends Controller {
    public function index(array $params = []){
        if($this->checkSession()){
            return $this->view('/admin/index', $params);
        }
        header("Location: /");
    }

    private function checkSession(){
        if(isset($_SESSION['login_ID']) && (time() - $_SESSION['LAST_ACTIVITY']) < LoginSession::$SESSION_LIFETIME_IN_SECONDS){
            LoginSession::updateActivity();
            return true;
        }else if(isset($_SESSION['login_ID']) && isset($_SESSION['LAST_ACTIVITY'])){
            LoginSession::destroySession();
            return false;
        }else{
            return false;
        }
    }

    public function post($params){
        var_dump($params);
    }
}