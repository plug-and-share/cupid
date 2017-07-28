<?php


if( isset($_POST['btn-login']) ) { 
	
	require "../Control/ControlLogin.php";

	$email = trim($_POST['email']);
	$pass = trim($_POST['pass']);

	$user = new Control($email, $pass);

	$errovalidacao = $user->LogarUsuario();		
	
	if($errovalidacao){
	 	header("Location: ../Home/home.php");
	}else
		header("Location: ../Login/login.php");
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>sign in</title>		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/login.css"/>
		<link rel="stylesheet" href="../css/home.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top show-scroll">				
			<div class="container">					
				<div class="navbar-header">						
					<a class="navbar-brand" href="../Home/home.php">
						<span style="vertical-align: middle;font-size: 25px;"><img src="../Pictures/logoS.png" width="30px">cupid</span>
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
						<li><a href="../Documentation/documentation.php">Documentation</a></li>
						<li><a href="https://github.com/plug-and-share/pine/archive/master.zip">Download</a></li>
						<li><a href="../ControlPanel/ControlPanel.php">Control Panel</a></li>							
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
						<li><a href="../Login/login.php">Sign in</a></li>
						<li><a href="../Register/register.php">Sign up</a></li>
					</ul>												
				</div>			
			</div>								
		</nav>				
		<!-- !!!Working here!!! -->		
		<div class="containter">
			<form method="post" action="" autocomplete="off">	
			<div class="login-box">
			    <div class="form-group">
			        <div class="alert alert-danger">
			    		<span class="glyphicon glyphicon-info-sign"></span>
				    </div>
				</div>
				<header>
					<img src="../Pictures/logoP.png" width="85%"/>
					<h4>Sign In</h4>		
				</header>
				<main>
					<div class="form">
						<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" />
					</div>
									
					<div class="form">
						<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
					</div>
					<div>
						<button class="btn custom-button" type="submit" name="btn-login">Log in</button>
					</div>
					<a class="text-center" style="display: block;" href="#">Forgot your password?</a>
				</main>
			</div>
		</div>
		<nav class="navbar navbar-default navbar-fixed-bottom show-scroll">																		
			<ul class="nav footer navbar-nav navbar-right">				
				<li><a href="#">terms</a></li> q
				<li><a href="#">privacy</a></li>
				<li><a href="#">security</a></li>					
				<li><a href="#">stats</a></li>
				<li><a href="#">credits</a></li>
				<li><a href="#">contact us</a></li>					
			</ul>						
		</nav>	
	</body>
</html>

