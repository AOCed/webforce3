<?php

// App/Cnx.php
namespace App;
use PDO;

class Cnx {
	
	const HOST = 'localhost';
	const USER = 'root';
	const PASSWORD = "root";
	const DB_NAME = "bibliotheque";
	
	/**
	 * 
	 * @var PDO
	 */
	private static $instance;
	
	/**
	 * Constructeur privé pour qu'on ne puisse pas instanicer la classe
	 */
	private function __construct(){}
	
	public static function getInstance(){

		if (is_null(self::$instance)){
			// echo 'instanciation de PDO'.'<br>';
			self::$instance = new PDO (
			'mysql:dbname=' . self::DB_NAME .';host=' . self::HOST,
				self::USER,
				self::PASSWORD,
				[
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION		
				]
 			); // else {
// 				echo 'PDO est déjà instsancié' . '<br />';
// 			}
		} 
		return self::$instance;
	}

	
}


