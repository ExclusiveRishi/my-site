<?php
namespace App\controllers;
use Library\Controller;
use Library\Database;

class Login extends Controller {

    public function index() {
    	if (!empty($_POST)) {
    		print_r($_POST);
    		echo PHP_EOL;
    	}
        echo "Welcome to login page!";
        $this->view("Login", "Login/index");
    }
}
