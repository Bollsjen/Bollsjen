<?php

namespace App\Routes;

class APIRouter {
    private static array $handlers;
    private static $notFoundHandler;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = 'DELETE';

    public static function get(string $path, $handler): void{
        self::addHandler(self::METHOD_GET,$path, $handler);
    }

    public static function post(string $path, $handler): void{
        self::addHandler(self::METHOD_POST,$path, $handler);
    }

    public static function put(string $path, $handler): void{
        self::addHandler(self::METHOD_PUT,$path, $handler);
    }

    public static function delete(string $path, $handler): void{
        self::addHandler(self::METHOD_DELETE,$path, $handler);
    }

    public static function addNotFoundHandler($handler): void {
        self::$notFoundHandler = $handler;
    }

    private static function addHandler(string $method, string $path, $handler): void{
        self::$handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }

    public static function run(){
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $params = explode('/',$requestPath);
        $method = $_SERVER['REQUEST_METHOD'];
        array_splice($params,0,1);

        $handerData = self::requestHandler($params);
        $callback = $handerData[0];
        $PARAM = $handerData[1];
        /*foreach(self::$handlers as $handler){
            $newReqPath = "/".$params[1]."/".$params[2];
            for($i = 3; $i < count($params); $i++){
                    $newReqPath = $newReqPath . "/{id}";
            }
            echo $newReqPath;
            if($handler['path'] === $newReqPath && $method === $handler['method']){
                $callback = $handler['handler'];
            }else{
                //echo $handler['path'] . " | " . $newReqPath . ", ";
                $newReqPath = "";
            }
        }*/

        if(is_string($callback)){
            $parts = explode('::', $callback);
            if(is_array($parts)){
                $className = array_shift($parts);
                $handler = new $className;

                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }

        if($callback == null){
            header("HTTP/1.0 404 Not Found");
            if(!empty(self::$notFoundHandler)){                
                $callback = self::$notFoundHandler;
            }
        }
        call_user_func_array($callback, [
            array_merge($_GET, $_POST, $PARAM)
        ]);
    }

    static function requestHandler($request){
        $PARAMS = [];
        $path = "/".$request[0]."/".$request[1];
        $method = $_SERVER['REQUEST_METHOD'];
        $handlerResult = null;
        foreach(self::$handlers as $handler){
            $handlerPathArray = explode("/",$handler['path']);
            array_splice($handlerPathArray,0,1);
            $chars = array("{", "}");

            if(count($handlerPathArray) === count($request) && ("/".$handlerPathArray[0]."/".$handlerPathArray[1]) == $path && $method === $handler['method']){
                $keyName = "";
                for($i = 2; $i < count($handlerPathArray); $i++){
                    $keyName = str_replace($chars,"",$handlerPathArray[$i]);
                    $PARAMS[$keyName] = $request[$i];
                }            
                $handlerResult = $handler['handler'];
            }
        }
        return array($handlerResult, $PARAMS);
    }
}