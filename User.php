<?php

require_once 'Db.php';

class User extends Db{

	private $db;

	public function __construct()
	{
		$this->db = $this->connect();

	}


	public function signup(string $email, $password, $username)
	{
		try{
			$stmt = $this->db->prepare("INSERT INTO users (user_email, user_pass, user_name) VALUES (:email, :password, :username) ");

			$stmt->bindparam(':email', $email);
			$stmt->bindparam(':password', $password);
			$stmt->bindparam(':username', $username);
			$stmt->execute();

      return $stmt;

		}

		catch(PDOExeception $e)
		{
			echo $e->getMessage();
		}


	}

    public function login(string $username, $password)
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:username OR user_pass=:password LIMIT 1");
            $stmt->execute(array(':username'=>$username, ':password'=>$password ));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0)
            {
                if(password_verify($password,$userRow['user_pass']))
                {
                	$_SESSION['login'] = TRUE;
                    $_SESSION['user_session'] = $userRow['user_name'];

                    return true;


                }

                else{
                    return false;
                }
            }
        }


        catch(PDOExeception $e)
        {
            echo $e->getMessage();
        }
    }

    public function is_logged()
    {
    	if(isset($_SESSION['login'])){
    		if($_SESSION['login'] != NULL){
    			return $_SESSION['login'];
    		}
    	}

    }

    public function logout()
    {
    	$_SESSION['login'] = FALSE;
    	session_unset();
    }


    public function check_user_exists($username)
    {
        try{
            $stmt = $this->db->prepare("SELECT user_name FROM users WHERE user_name=:username");
            $stmt->execute(array(':username'=>$username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['user_name'] == $username;


        }

        catch(PDOExeception $e)
        {
            echo $e->getMessage();
        }
    }

	public function check_email_exists($email)
	{
		try{
			$stmt = $this->db->prepare("SELECT user_email FROM users WHERE user_email=:email");
			$stmt->execute(array(':email'=>$email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row['user_email'] == $email;
		}

		catch(PDOExeception $e)
		{
				echo $e->getMessage();
		}
	}


    public function redirect($url)
    {
    	return header("Location:$url.php");
    }




}
