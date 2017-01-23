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
					<a class="navbar-brand" href="./home.html">
						<span style="vertical-align: middle;font-size: 25px;"><img src="logo2.jpg" width="40px">cupid</span>
					</a>						
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>					
				<div class="collapse navbar-collapse"  id="menu">
					<ul class="nav navbar-nav" style="padding: 0px 0px 0px 50px">
						<li><a href="#">getting started</a></li>
						<li><a href="./documentation.html">documentation</a></li>
						<li><a href="./download.html">download</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">simulation<span class="caret"></span></a>
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
						<li><a href="./login.html">sign in</a></li>
						<li><a href="./register.html">sign up</a></li>
					</ul>												
				</div>			
			</div>								
		</nav>				
		<!-- !!!Working here!!! -->		
		<div class="containter">	
			<div class="login-box">
				<header>
					<img src="logo2.jpg" width="45%"/>
					<h4>Sign In</h4>		
				</header>
				<main>
					<div class="form">
						<input class="form-control" type="email" placeholder="e-mail">				
					</div>
					<div class="form">
						<input class="form-control" type="password" placeholder="password">					
					</div>
					<div>
						<button class="btn custom-button" type="submit">Log in</button>
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

