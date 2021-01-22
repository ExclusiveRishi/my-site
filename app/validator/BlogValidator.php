<?php
namespace App\Validator;
class BlogValidator{
    private $validatedArray;
    public $message = " ";
    public $preview;
    private $data;
    private $anyError = false;
    public function __construct(array $data){// $data is just $_POST request
        if(empty($data['title']) || empty($data['content'])){
            $this->anyError = true;
            $this->message .= "Fill all the inputs idiot <br>";
        }
        if(\strlen($data['title']) > 64){
            $this->anyError = true;
            $this->message .= "Keep the title short <br>";
        }
        if(preg_match_all('/[\-\/]/', $data['title'], $matches, PREG_PATTERN_ORDER)){
            $this->anyError = true;
            $this->message .= "Noooo you can't just add '" . $matches[0][0] . "' to title!<br>";
        }
        if(!$anyError){
            $this->data = $data;
        }
    }
    public function validator(){
        if($anyError){
            return "# Nigga write correctly";
            end;
        }
        return $this->data;
    }
}