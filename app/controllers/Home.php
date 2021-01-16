<?php
namespace App\controllers;

use Library\Controller;

class Home extends Controller {
    public function index($name = ""){
        $user = $this->model('User');
        $user->name = $name;
        // echo $user->name;

        $this->view("Home", "home/index", ['name' => $user->name, 'route' => $_SERVER['DOCUMENT_ROOT']]);

    }
    public function greet(){
        echo "Hello Earth!";
    }
}
