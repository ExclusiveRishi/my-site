<?php
namespace Library;

class Controller {
    public function model($model){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Models/" . $model . ".php";
        $model = '\\App\\Models\\' . $model;
        return new $model();
    }
    public function view(
        $title,
        $view, 
        $data = [],
        ){//$data is parameter for $view file
        extract($data);

        require_once $_SERVER['DOCUMENT_ROOT'] . "/app/views/template/header.php";
           
        require_once $_SERVER['DOCUMENT_ROOT'] . "/app/views/" . $view . ".php";
        
        require_once $_SERVER['DOCUMENT_ROOT'] . "/app/views/template/footer.php";
    }
}
?>
