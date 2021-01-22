<?php
namespace App\controllers;
use Library\Controller;
use Library\Database;

class Blog extends Controller{

    public function __construct(){
        $this->model = new \App\Models\Post();
    }

    public function index(){

        $res = $this->model->fetchBlogs();

        $this->view(
            'Blog',
            'blog/index',
            [
                'res' => $res
            ]
        );
    }
    public function post($slug = 'wrong'){
        if($slug == 'wrong'){
            echo "Invalid url click <a href='/'>here</a> to see homepage!";
        }
        $res = $this->model->fetchBySlug($slug);
		
        $this->view(
            'Post',
            'Post/index',
            [
                'res' => $res
            ]
        );
    }
}
