<?php 
class dbConnection{
    private static $DAL;
    
    private function __construct(){
    }

    static function getInstance(){
        if(self::$DAL == NULL){
            $env = parse_ini_file('../../.env');
            $db_host = $env['DB_HOST'];
            $db_name = $env['DB_NAME'];
            $db_user = $env['DB_USER'];
            $db_pass = $env['DB_PASS'];
            
            self::$DAL = new PDO("mysql:host=$db_host;port=3306;dbname=$db_name", $db_user, $db_pass);
            return self::$DAL;
        }
        else{
            return self::$DAL;
        }
    }
}

dbConnection::getInstance();
?>
