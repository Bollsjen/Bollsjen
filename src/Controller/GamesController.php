<?php

namespace App\Controller;

use App\Controller\Controller;

class GamesController extends Controller {
    public function listGames(array $params = []){
        $this->view('games/games', $params);
    }

    public function post($params){
        var_dump($params);
    }
}