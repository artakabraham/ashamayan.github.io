<?php

require_once 'config.php';

class Db {
	
	public static function getConnection(){
		
		$db = new PDO("mysql:host=".HOST.";dbname=".DBNAME,USER,PASSWORD);
		
		$db->exec("set names utf8");
		
		return $db;	
		
	}
	
}
?>