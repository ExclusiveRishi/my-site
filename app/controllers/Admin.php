<?php
namespace App\controllers;
use Library\Controller;
use Library\Database;
use Cocur\Slugify\Slugify;
use App\Models\writeBlogs;

if($_SESSION['isloggedIn'] == 0){
    header("Location: /login"); // change location after making log in page
    exit();
}

date_default_timezone_set("Asia/Kolkata");

class Admin extends Controller{

    public function index($name = "Rishi"){

        $date = date("d/M/y", time());

        if(!empty($_POST)){
            //Validates blogs here
            $valid = new \App\Validator\BlogValidator($_POST);
            // echo $valid->message;
            //if blog is validated it returns $_POST as $data
            $validatedShit = $valid->validator();


            $Parsedown = new \Parsedown();
            //$parsedContent only parses $_POST['content'] and not the titles
            $parsedContent = $Parsedown->text($validatedShit['content']);


            $slugify = new Slugify();

            //$slugify deepthroats title and replaces whitespaces with dashes '-'
            $sluggedTitle = $slugify->slugify($validatedShit['title']);

            echo "<h1>" . writeBlogs::set(
                [
                'title' => $validatedShit['title'],
                'slug' => $sluggedTitle,
                'content' => $parsedContent                 
                ],
                new Database
            ) . "</h1>";
        }
        // dateformat 20/apr/1969
        

        $this->view(
            "admin/index",
            [
                /*
                this array goes to core/Controller.php as $data
                and key values are extracted as variables
                 */
                'name' => $name,
                'date' => $date ,
                'root' => $_SERVER['DOCUMENT_ROOT'],
                'previewData' => [$sluggedTitle ,$parsedContent]
            ],
            "admin/admin_header"
            /* this one is for custom header add , for custom footer */

        );

    }
}
