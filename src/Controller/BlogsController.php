<?php

namespace App\Controller;

class BlogsController extends Controller {

    public function execute($params){
        $this->view('blogs/blogs-list', $params);
        //var_dump($this->query("SELECT * FROM blog_categories"), null);
    }

    public function categories($params){
        $this->view('blogs/categories/'.$params['category'], $params);
    }

    public function theBlogs($params){
        $this->view("blogs/posts/".$params['article'], $params);
    }

}