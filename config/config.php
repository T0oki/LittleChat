<?php
if (!class_exists("serveurDB")) {
    class serveurDB {
        public static $hostname;
        public static $tablename;
        public static $user;
        public static $password;

        public static function init(){
            self::$hostname 	= "localhost";
            self::$tablename 	= "apimessage";
            self::$user 		= "root";
            self::$password 	= "";
        }
    }
    serveurDB::init();
}
