<?php
namespace App\controllers;

use Library\Controller;

class Immax extends Controller {
    public function index(){

        $this->view("Immax", "immax/index");
    }
}