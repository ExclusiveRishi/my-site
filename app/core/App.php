<?php
namespace Library;
class App {

    protected $controller = 'Home';

    protected $method = 'index';

    protected $params = [];

    public function __construct(){
        
        $url = $this->parseUrl();
        
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . "/app/controllers/" . $url[0] . ".php")){
            http_response_code(404);
        }

        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/app/controllers/" . $url[0] . ".php")){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once($_SERVER['DOCUMENT_ROOT'] . "/app/controllers/" . $this->controller . ".php");
        $controller = '\\App\\Controllers\\' . $this->controller;
        $this->controller = new $controller;

        

        if(method_exists($this->controller, $url[1])){
            // echo "Ok";
            // echo "<br>";
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    protected function parseUrl(){

        /*
        Credits: "https://github.com/sierra-project/sierra"
        */

        $trim = ucfirst(trim($_SERVER['REQUEST_URI'], '/'));

        if (!empty($trim)) {
            $this->url_string = $this->url = $trim;
            $this->url = explode('/', $this->url);

            if (!isset($this->url[1]) || empty($this->url[1])) {
                $this->url[1] = 'index';
            }
            return $this->url;
        } else {
            $this->url = ['Home', 'index'];
            $this->url_string = '';
            return $this->url;
        }
    }
}
