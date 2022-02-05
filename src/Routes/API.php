<?php

namespace App\Routes;

use App\Api\ItemAPI;
use App\Api\RandomStuffAPI;
use App\Routes\APIRouter;
use App\Api\NoAPIFound;
use App\Api\ProductsAPI;

class API {
    
    public static function init(){
        APIRouter::get('/api/random', RandomStuffAPI::class . '::execute');
        APIRouter::get('/api/items', ItemAPI::class . '::getAll');
        APIRouter::get('/api/items/{id}', ItemAPI::class . '::getByID');
        APIRouter::get('/api/items/{key}/{id}', ItemAPI::class . '::getByID');
        APIRouter::get('/api/products/{key}/{id}', ProductsAPI::class . '::getByID');

        APIRouter::post('/api/items', ItemAPI::class . '::add');

        APIRouter::put('/api/items', ItemAPI::class . '::update');

        APIRouter::delete('/api/items/{id}', ItemAPI::class . '::delete');

        APIRouter::addNotFoundHandler(function($param){
            $notFound = new NoAPIFound();
            $notFound->execute($param);
        });

        APIRouter::run();
    }
}