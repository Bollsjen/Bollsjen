<?php

namespace App\Api;

class RandomStuffAPI {
    private array $stuff = array(
        0 => "Hello World!", 1 => "Hello Universe!", 2 => "Hello Human!", 3=> "Hello There!"
    );
    public function execute(){
        $rand = rand(0, count($this->stuff)-1);
        $msg = array("message" => $this->stuff[$rand]);
        echo json_encode($msg);
    }
}