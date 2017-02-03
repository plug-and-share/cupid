<?php
	 ob_start();
	 session_start();
	 require_once 'dbconnect.php';
	 
	 // it will never let you open index(login) page if session is set
	 if ( isset($_SESSION['user'])!="" ) {
	  header("Location: home.php");
	  exit;
	 }
	 
	 $error = false;
	 
	 if( isset($_POST['btn-login']) ) { 
	  
	  	// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		  
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
			  
	  if(empty($email)){
	   $error = true;
	   $emailError = "Please enter your email address.";
	  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
	   $error = true;
	   $emailError = "Please enter valid email address.";
	  }
	  
	  if(empty($pass)){
	   $error = true;
	   $passError = "Please enter your password.";
	  }
	  
	  // if there's no error, continue to login
	  if (!$error) {
	   
	   $password = hash('sha256', $pass); // password hashing using SHA256
	  
	   $res=mysql_query("SELECT userId, userPass FROM users WHERE userEmail='$email'");
	   $row=mysql_fetch_array($res);
	   $count = mysql_num_rows($res); // if pass correct it returns must be 1 row
	   
	   if( $count == 1 && $row['userPass']==$password ) {
	    $_SESSION['user'] = $row['userId'];
	    header("Location: home.php");
	   } else {
	    $errMSG = "Incorrect Credentials, Try again...";
	   }
	    
  }
  
 }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>sign in</title>		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="login.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
	</head>
	<body>
		<!---->
		<nav class="navbar navbar-default navbar-fixed-top show-scroll">				
			<div class="container">					
				<div class="navbar-header">						
					<a class="navbar-brand" href="./home.php">
						<span style="vertical-align: middle;font-size: 25px;"><img src="logoS.png" width="30px">cupid</span>
					</a>						
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>					
				<div class="collapse navbar-collapse"  id="menu">
					<ul class="nav navbar-nav" style="padding: 0px 0px 0px 50px">
						<li><a href="#">Getting Started</a></li>
						<li><a href="./documentation.html">Documentation</a></li>
						<li><a href="./download.html">Download</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">DSE<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="./new_simulation.html">new simulation</a></li>
							<li><a href="#">access benchmark</a></li>
							<li><a href="#">evaluate method</a></li>
						  </ul>
						</li>							
					</ul>		
					<ul class="nav navbar-nav navbar-right">
						<li>     
							<form class="navbar-form navbar-header">
								<div class="form-group" style="display:inline;">
								  <div class="input-group">
									<input type="text" class="form-control" placeholder="simulation ID">
									<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
								  </div>
								</div>
							</form>
						</li>
						<li><a href="./login.php">Sign in</a></li>
						<li><a href="./register.php">Sign up</a></li>
					</ul>												
				</div>			
			</div>								
		</nav>				
		<!-- !!!Working here!!! -->		
		<div class="containter">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">	
			<div class="login-box">
			 <?php
			   if ( isset($errMSG) ) { 
			?>
			    <div class="form-group">
			        <div class="alert alert-danger">
			    		<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
				    </div>
				</div>
			   <?php
			   }
			   ?>
				<header>
					<img src="logoP.png" width="85%"/>
					<h4>Sign In</h4>		
				</header>
				<main>
					<div class="form">
						<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
					</div>
					<span class="text-danger"><?php echo $emailError; ?></span>
									
					<div class="form">
						<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
					</div>
					<span class="text-danger"><?php echo $passError; ?></span>
					<div>
						<button class="btn custom-button" type="submit" name="btn-login">Log in</button>
					</div>
					<a class="text-center" style="display: block;" href="#">Forgot your password?</a>
				</main>
			</div>
		</div>
		<!---->
		<nav class="navbar navbar-default navbar-fixed-bottom show-scroll">																		
			<ul class="nav navbar-nav navbar-right">				
				<li><a href="#">terms</a></li>
				<li><a href="#">privacy</a></li>
				<li><a href="#">security</a></li>					
				<li><a href="#">stats</a></li>
				<li><a href="#">credits</a></li>
				<li><a href="#">contact us</a></li>					
			</ul>						
		</nav>	
	</body>
</html>

