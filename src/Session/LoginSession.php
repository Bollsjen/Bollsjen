<?php

namespace App\Session;

class LoginSession {

    public static $SESSION_LIFETIME_IN_SECONDS = 1800;

    public static function setSession($params){
        $_SESSION['login_ID'] = $params['login_ID'];
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function updateActivity(){
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function destroySession(){
        //Dette ødelægger også langSession
        //Fiks dette i fremtiden xD
        session_unset();
        session_destroy();
    }

}