<?php
namespace myApp;
use PDO;

class Db{

	private $dbh = 'mysql:host=127.0.0.1;dbname=eli9;port=8889';

	public function connect()
	{

		try {
		    $db = new PDO($this->dbh, 'root', 'root');
		    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				return $db;
		}
		catch (PDOException $e){
		    echo $e->getMessage();
		}

	}


}
