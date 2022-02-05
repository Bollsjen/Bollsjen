<?php

namespace App\Routes;

use App\Routes\Router;

use App\Controller\NotFoundController;
use App\Controller\ContactController;
use App\Controller\HomeController;
use App\Controller\AboutController;
use App\Controller\AdminController;
use App\Controller\BlogsController;
use App\Controller\LoginController;
use App\Controller\UserController;
use App\Controller\GamesController;
use App\Session\LangSession;

class Web {

    public static function init()
    {
        Router::get('/', HomeController::class . '::execute');
        Router::get('/login', LoginController::class . '::execute');
        Router::get('/logout', LoginController::class . '::logout');
        Router::get('/admin', AdminController::class . '::index');

        Router::get('/about', AboutController::class . '::execute');
        Router::get('/contact', ContactController::class . '::execute');
        Router::get('/blogs', BlogsController::class . '::execute');
        Router::get('/games', GamesController::class . '::listGames');

        Router::get('/user/{id}', UserController::class . '::execute');
        Router::get('/blogs/{id}', BlogsController::class . '::categories');
        Router::get('/blogs/{id}/{title}', BlogsController::class . '::theBlogs');
        

        Router::post('/contact', ContactController::class . '::post');
        Router::post('/session/lang', LangSession::class . '::setSession');
        Router::post('/login', LoginController::class . '::post');

        Router::addNotFoundHandler(function($param){
            $notFound = new NotFoundController();
            $notFound->execute($param);
        });

        Router::run();
    }

}