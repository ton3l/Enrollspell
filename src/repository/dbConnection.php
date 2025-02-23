<?php 
    class dbConnection{
        private static $DAL;

        private function __construct(){
        }

        static function getInstance(){
            if(self::$DAL == NULL){
                self::$DAL = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=enrollspell', 'postgres', '1234');
                return self::$DAL;
            }
            else{
                return self::$DAL;
            }
        }
    }

?>