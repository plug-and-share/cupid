<?php
	ob_start();
	session_start();
	
	if( isset($_SESSION["user"])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	
	if ( isset($_POST["createAcc"]) ) {

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		$pass1 = trim($_POST['pass1']);
		$pass1 = strip_tags($pass1);
		$pass1 = htmlspecialchars($pass1);

		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}

		if( empty($pass1)){ // TODO: Ainda nao esta funcionando
			$erro = true;
			$pass1Error = "The passwords are not equal.";
		}else if(strcmp($pass1,$pass) != 0){
			$error = true;
			$pass1Error = "Password are not equal.";
		}


		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userId,userEmail,userPass) VALUES(NULL,'$email','$password')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}			
		}		
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>sign up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="register.css"/>
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
						<li><a href="#">Getting Gtarted</a></li>
						<li><a href="./documentation.html">Documentation</a></li>
						<li><a href="./download.php">Download</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">DSE<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="./new_simulation.php">new simulation</a></li>
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
				<header>
					<img src="logoP.png" width="85%"/>
					<h4>Join us</h4>		
				</header>
				<main>
					<div class="form">
						<!-- <input class="form-control" type="email" placeholder="e-mail"> -->
						<input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="40" value="<?php echo $email ?>" />
						<div>						
							<span class="text-danger"><?php echo $emailError; ?></span>				
						</div>					
					</div>
					<div class="form">
						<!--<input class="form-control" type="password" placeholder="password"> -->		
						<input type="password" name="pass" class="form-control" placeholder="Password" maxlength="100" />						
						<div>
							<span class="text-danger"><?php echo $passError; ?></span>			
						</div>					
					</div>
					<div class="form">
						<!--<input class="form-control" type="password" placeholder="confirm your password">-->
						<input type="password" name="pass1" class="form-control" placeholder="Confirme your password" maxlength="100" />					
						<div>
							<span class="text-danger"><?php echo $pass1Error; ?></span>			
						</div>						
					</div>		
					<div class="form">
						<label for="university">Select your university:</label>
						<select class="form-control" id="university">
							<option>Aqiwdopwjid</option>
							<option>Aqiowdjiwqjd</option>
							<option>Ackqmkiwqddd</option>
							<option>Bqwdwqiodjiw</option>
						</select>
					</div>			
					<div>
						<button class="btn custom-button" type="submit" name="createAcc">Create an account</button>
					</div>
				</main>
			</div>
			</form>
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

