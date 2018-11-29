<?php
session_start();

// Report simple running errors

$guest = new \myApp\User();


$username = htmlentities(trim($_POST['txt_username']));
$unpass = htmlentities(trim($_POST['txt_password']));
$password = password_hash($unpass, PASSWORD_BCRYPT, ['cost' => 12] );
$unemail = $_POST['txt_email'];
$email = filter_var($unemail, FILTER_VALIDATE_EMAIL);


if($guest->is_logged())
{
    $guest->redirect('dashboard');
}

if (isset($_POST['btn_signup']) ){

    if($guest->check_user_exists($username)){
        $errors[]= "Username Already Taken";
    }
    elseif(strlen($username) < 6){
      $errors[] = "Username must be at least 6 characters";
    }
    elseif(strlen($unpass) < 6){
      $errors[] = "Password must be at least 6 characters";
    }

    elseif($guest->check_email_exists($email)){
        $errors[]= "Email Already Taken";
    }

    elseif($guest->signup($email,$password,$username)){
        header("Location:index.php?registered");
        die('didnt redirect');
    }
    else{
      $errors[]= "Invalid Entry";
    }


}

$title = "Home";
require_once 'layouts/header.php';


?>


    <div class="container">
        <div class="row">
            <div class="col-md-6">

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
            else if(isset($_GET['registered']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
                 </div>
                 <?php
            }
            ?>

                <h1>Sign Up</h1>




                <form action ="" method="POST">
                  <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" name="txt_email" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="txt_username" placeholder="Enter Username" required>
                  </div>


                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" aria-describedby="emailHelp" name="txt_password" placeholder="Enter password" required>
                  </div>


                     <button type="submit" name="btn_signup" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>


</body>
</html>
