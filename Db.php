<?php 

error_reporting(-1);

class Db{

	private $host = DB_HOST;  
	private $user = DB_USER;  
	private $pass = DB_PASS;  
	private $dbname = DB_NAME;  

	public function connect()
	{
		
		try {
		    $db = new PDO("mysql:host=127.0.0.1;dbname=eli9;port=8889", 'root', 'root');
		    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	


		} 
		catch (PDOException $e){
		    echo $e->getMessage();
		}


		return $db;

	}


}