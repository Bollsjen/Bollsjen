<?php

namespace App\Session;

class LangSession{

    public function setSession($lang){
        $_SESSION['lang'] = $lang['lang'];
        $newLang = $_SESSION['lang'];
        $_SESSION['lang'] = $newLang;
    }

}