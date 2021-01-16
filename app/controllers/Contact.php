<?php
namespace App\controllers;
use Library\Controller;
class Contact extends Controller {
    public function index($name = ""){
        echo $name;
    }
}