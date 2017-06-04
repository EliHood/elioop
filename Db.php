<?php 

error_reporting(-1);

class Db{

	private $db_host;
	private $db_user;
	private $db_name;
	private $db_pass;

	public function connect()
	{
		$this->db_host = "127.0.0.1";
		$this->db_user = "root";
		$this->db_pass = "root";
		$this->db_name = "eli9";
		
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