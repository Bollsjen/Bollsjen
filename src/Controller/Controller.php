<?php

namespace App\Controller;

use App\Database\DBConnection;

class Controller extends DBConnection {

    public function view1($view){
        $params['navbarLang'] = $this->getNavbarLang();
        $params['footerLang'] = $this->getFooterLang();
        $params['contentLang'] = $this->getLang($view);
        $data = $params;
        require_once (__DIR__."/../../templates/pageHeader.phtml");
        if(!file_exists(__DIR__."/../Views/".$view.".php")){
            require_once (__DIR__."/../Views/404/NotFound.php");
        }else{
            require_once (__DIR__."/../Views/".$view.".php");
        }
        require_once (__DIR__."/../../templates/pageFooter.phtml");
    }

    public function view2($view, $params){
        $params['navbarLang'] = $this->getNavbarLang();
        $params['footerLang'] = $this->getFooterLang();
        $params['contentLang'] = $this->getLang($view);
        $data = $params;
        require_once (__DIR__."/../../templates/pageHeader.phtml");
        if(!file_exists(__DIR__."/../Views/".$view.".php")){
            require_once (__DIR__."/../Views/404/NotFound.php");
        }else{
            require_once (__DIR__."/../Views/".$view.".php");
        }
        require_once (__DIR__."/../../templates/pageFooter.phtml");
    }

    public function __call($method, $arguments)
    {
        if($method == 'view'){
            if(count($arguments) == 1){
                return call_user_func_array(array($this, 'view1'), $arguments);
            }else if(count($arguments) == 2){
                return call_user_func_array(array($this, 'view2'), $arguments);
            }
        }
    }

    public function getLang($page){
        $path = "";
        if(isset($_SESSION['lang'])){
            if($_SESSION['lang'] == "da"){
                $path = __DIR__."/../../resources/lang/da/$page.json";
            }else if($_SESSION['lang'] == "en"){
                $path = __DIR__."/../../resources/lang/en/$page.json";
            }
        }else{
            $path =__DIR__."/../../resources/lang/da/$page.json";
        }
        $strJsonFile = "";
        if(file_exists($path)){
            $strJsonFile = file_get_contents($path);
        }

        return $strJsonFile;
    }

    public function getNavbarLang(){
        $path = "";
        if(isset($_SESSION['lang'])){
            if($_SESSION['lang'] == "da"){
                $path = __DIR__."/../../resources/lang/da/navbar.json";
            }else if($_SESSION['lang'] == "en"){
                $path = __DIR__."/../../resources/lang/en/navbar.json";
            }
        }else{
            $path =__DIR__."/../../resources/lang/da/navbar.json";
        }

        $strJsonFile = file_get_contents($path);

        return $strJsonFile;
    }
    
    public function getFooterLang(){
        $path = "";
        if(isset($_SESSION['lang'])){
            if($_SESSION['lang'] == "da"){
                $path = __DIR__."/../../resources/lang/da/footer.json";
            }else if($_SESSION['lang'] == "en"){
                $path = __DIR__."/../../resources/lang/en/footer.json";
            }
        }else{
            $path =__DIR__."/../../resources/lang/da/footer.json";
        }

        $strJsonFile = file_get_contents($path);

        return $strJsonFile;
    }
}