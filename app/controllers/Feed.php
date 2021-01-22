<?php
namespace App\controllers;
use Library\Controller;
use \FeedIo\Factory;
use FeedIo\Feed as FeedObject;

class Feed extends Controller{
    
    public function __construct(){
        $this->model = new \App\Models\Post();
    }
    
    public function index($name = "atom"){
        
        $res = $this->model->fetchBlogs();

        $feed =  new FeedObject();
        foreach ($res as $key => $value) {
            $item = $feed->newItem();
            if($key == 'slug')
            {
                continue;
            }
            if($key == 'title')
            {
                $item->setTitle($value);
                continue;
            }
        
            if($key == 'TimeStamp')
            {
                $item->setLastModified(new \DateTime());
                continue;
            }
        
            $item->setDescription($value);

            $feed->add($item);
        }

        $feedIo = Factory::create()->getFeedIo();
        header("Content-Type: application/xml+" . $name);
        $opt = $feedIo->format($feed, $name);

        echo $opt;
        
    }
    
}

?>