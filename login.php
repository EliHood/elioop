<?php
require_once 'bootstrap.php';
session_start();
error_reporting(-1);


$guest =  new myApp\User();


if($guest->is_logged())
{
    $guest->redirect('dashboard');
}



if(isset($_POST['btn_login'])){


    $username = $_POST['txt_username'];
    $password = $_POST['txt_pass'];


    if($username == "")
    {
      $errors[] = 'Enter username please';

    }

    if($password == "")
    {
        $errors[] = "Enter password please";
    }


    if($guest->login($username, $password)){
        $guest->redirect('dashboard');
    }


    else{
        $errors[] = "Invalid Entry";
    }



}

$title = "Login";

require_once 'layouts/header.php';



?>

<div class="container">
    <div class="row">
        <div class="col-md-4">


            <?php
            if(isset($errors))
            {
               foreach($errors as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }

            ?>


            <h1>Sign In</h1>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="txt_username" class="form-control" required/>
                </div>


                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="txt_pass" class="form-control" required/>
                </div>


             <button type="submit" name="btn_login" class="btn btn-primary">Log In</button>

            </form>
        </div>
    </div>
</div>
