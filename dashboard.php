<?php
session_start();
require_once 'bootstrap.php';

error_reporting(-1);

$user = new \myApp\User();
if(isset($_GET['q'])){
   $user->logout();
   $user->redirect('login');
}

$title = "Dashboard";

require_once 'layouts/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">

		<h1>Welcome
		<?php
		$usern= $_SESSION['user_session'];

		$username = strtolower($usern);

		echo $username;

		?>
		</h1>


		</div>
	</div>
</div>

<?php require_once ('layouts/footer.php');?>
