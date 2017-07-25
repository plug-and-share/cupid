<?php
	
	if ( isset($_POST["createAcc"]) ) {

		require "../Control/ControlRegister.php";

		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);
		$pass1 = trim($_POST['pass1']);
		
		$user = new Control($email, $pass,$pass1);

		$errovalidacao = $user->InserirUsuario();
		
		if($errovalidacao)		
			header("Location: ../Home/home.php");
		else
			echo $errovalidacao;
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>sign up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/register.css"/>
		<link rel="stylesheet" href="../css/home.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
	</head>
	<body>
		<!---->
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
						<li><a href="#">Getting Gtarted</a></li>
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
		<div class="containter row">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">	
			<div class="login-box">
				<header>
					<img src="../Pictures/logoP.png" width="85%"/>
					<h4>Join us</h4>		
				</header>
				<main>
					<div class="form">
						<input type="email" name="email" class="form-control" placeholder="Email" maxlength="40"/>				
					</div>
					<div class="form">
						<input type="password" name="pass" class="form-control" placeholder="Password" maxlength="100" />	
					</div>
					<div class="form">
						<input type="password" name="pass1" class="form-control" placeholder="Confirme your password" maxlength="100" />											
					</div>		
					<div class="form">
						<label for="university">Select your university:</label>
						<select class="form-control" id="university">
							<option>Universidade Estadual do Oeste do Paraná</option>
							<option>Universidade Estadual de Maringá</option>
							<option>Universidade Federal do Rio Grande do Sul </option>
							<option>Universidade Estadual de Londrina</option>
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
			<ul class="nav footer navbar-nav navbar-right">				
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

