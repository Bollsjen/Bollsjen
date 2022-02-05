<?php

namespace App\Api;

class ItemAPI extends BaseAPI {
    private array $stuff = array(
        0 => "Hello World!", 1 => "Hello Universe!", 2 => "Hello Human!", 3=> "Hello There!"
    );
    public function getAll(){
        echo json_encode($this->stuff);
    }

    public function getByID($params){        
        $msg = array("message" => $this->stuff[$params['id']], "key" => $params['key']);
        echo json_encode($msg);
    }

    public function add($params){
        $data = json_decode(file_get_contents('php://input'), true);
        echo "Add: ";
        var_dump($data);
    }

    public function update($params){
        $data = json_decode(file_get_contents('php://input'), true);
        echo "Update: ";
        var_dump($data);
    }

    public function delete($params){
        array_splice($this->stuff, $params['id'], 1);
        var_dump($this->stuff);
        //echo $params['KEY'];
    }
}