<?php
namespace App\Models;
use Library\Database;
class Post{

    public function __construct(){
        $this->dataBase = (new Database)->instanciate();
    }

    public function fetchBlogs(){
        $stmt = $this->dataBase->prepare("SELECT `slug`, `title`,`TimeStamp` , `content` FROM data");
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function fetchBySlug($slug)
    {
        $stmt = $this->dataBase->prepare("SELECT `slug`,`title`,`TimeStamp`,`content` FROM data WHERE slug = :slug LIMIT 1");
        if($stmt->execute([':slug'=> $slug])){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }else{
            return "Something went wrong";
        }
    }
}