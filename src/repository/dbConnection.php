<?php 
    class dbConnection{
        private static $DAL;

        private function __construct(){
        }

        static function getInstance(){
            if(self::$DAL == NULL){
                self::$DAL = new PDO('mysql:host=127.0.0.1;port=3306;dbname=enrollspell', 'root', '1234');
                return self::$DAL;
            }
            else{
                return self::$DAL;
            }
        }
    }

    dbConnection::getInstance();
?>