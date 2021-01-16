<?php
namespace Library;
class Database{
    public $dbh;
    public function instanciate(){
            $db_server = "localhost";
            $db_name = "pages";
            $db_user = 'root';
            $db_pass = "R19723022477$";

            $dsn = 'mysql:host='.$db_server.';dbname='.$db_name;
            return new \PDO($dsn, $db_user, $db_pass);
    }

}
