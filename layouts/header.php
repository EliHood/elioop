<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title;?> | </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<body>
	<!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-inverse-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Eli PHP OOP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>

            <?php 

            $guest = new User();

            if($guest->is_logged()):?>
            <li><a href="/dashboard.php?q=logout">Logout</a></li>
            <li><a href="/dashboard">Profile</a></li>

            <?php else :?>
                <li><a href="/login.php">Login</a></li>
                
          <?php endif;?>

            <li><a href="/contact">Contact</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>