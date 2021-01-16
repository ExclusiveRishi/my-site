<?php
namespace App\Models;

class writeBlogs{

    public static function set(array $data, $instance){
        $title = $data['title'];
        $slug = $data['slug'];
        $content = $data['content'];
        $dbh = $instance->instanciate();

        $stmt = $dbh->prepare('INSERT INTO data(slug, title, content) VALUES(:slug, :title, :content)');
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':content', $data['content']);
        
        return $stmt->execute();
    }
}