<?php 
    class dbConnection{
        private static $DAL;

        private function __construct(){
        }

        static function getInstance(){
            if(self::$DAL == NULL){
                self::$DAL = new PDO('mysql:host=localhost;port=3306;dbname=ENROLLSPELL', 'root', '');
                return self::$DAL;
            }
            else{
                return self::$DAL;
            }
        }
    }

    dbConnection::getInstance();
?>