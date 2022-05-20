<?php

session_start();

class Database{

	static $establish = false;
	static $conn;
    public static function getConnection(){

		if(self::$establish == true){
			return $self::conn;
		}
		else{
			self::$conn = new mysqli('localhost', 'root', '', 'hfds');
			if(self::$conn->connect_error){
				die("Error failed to connect to MySQL: " . self::$conn->connect_error);
			} else {
				self::$establish == true;
				return self::$conn;
			}
		}
    }
}
?>