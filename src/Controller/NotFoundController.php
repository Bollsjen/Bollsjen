<?php

namespace App\Controller;

use App\Controller\Controller;

class NotFoundController extends Controller {

    public function execute($params){
        $params['navbarLang'] = $this->getNavbarLang();
        $params['footerLang'] = $this->getFooterLang();
        $this->view('404/NotFound', $params);
    }

}