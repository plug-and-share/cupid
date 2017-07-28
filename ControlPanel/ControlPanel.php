<?php
	session_start();

	require "../Control/ControlControlPanel.php";
	require "../Control/ControlOverallStatistics.php";
	require "../Control/ControlApplicationStatistic.php";

	if(isset($_SESSION['user'])){
		$panel = new ControlPanel( $_SESSION['user'] );
		$statistic = new ControlOverAll( $_SESSION['user'] );
		$application = new ControlApp( $_SESSION['user'] );

		$app_data = $application->ApplicationStatistic();
	    $stats_data = $statistic->OverAllStatistics();
		$panel_data = $panel->ControlP();
	}else{
		header("Location: ../Home/home.php"); 
	}

	if(isset($_POST['add'])){
		$addMachine = $panel->add_Machine($_POST['add']);
	}

	if(isset($_POST['rm'])){
		$rmMachine = $panel->RMMachine($_POST['rm']);
	}

	if(isset($_POST['coll'])){
		$collMachine = $panel->CollApp($_POST['app'], $_POST['coll']);
	}

	if(isset($_POST['dcoll'])){
		$dcollMachine = $panel->DescollApp($_POST['dcoll']);
	}

	if(isset($_POST['stopM'])) {
		$stopM = $panel->stopMachine($_POST['stopM']);
	}

	if(isset($_POST['startM'])) {
		$stopM = $panel->startMachine($_POST['startM']);
	}

	if(isset($_POST['pauseM'])) {
		$stopM = $panel->pauseMachine($_POST['pauseM']);
	}
?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Control Panel</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../Home/home.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
	</head>

	<body>
	<script>
		function addMachine() {
			var ip = document.getElementById('ipTextBox').value;
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{add:ip}})
		}

		function rmMachine() {
			var machineId = document.getElementById("machineIDTextBox").value;
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{rm:machineId}})
		}

		function coll() {
			var machineId = document.getElementById("machineID2TextBox").value;
			var appId = document.getElementById("appIDTextBox").value;
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{coll:machineId, app:appId}})
		}

		function descoll() {
			var machineId = document.getElementById("machineID3TextBox").value;
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{dcoll:machineId}})
		}

		function stopMachine(machineId) {
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{stopM:machineId}})	
		}

		function pauseMachine(machineId) {
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{pauseM:machineId}})	
		}

		function startMachine(machineId) {
			$.ajax( {type:'POST',
					 url:'ControlPanel.php',
					 data:{startM:machineId}})	
		}				
	</script>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default navbar-fixed-top show-scroll">				
					<div class="container">			
						<div class="navbar-header">						
							<a class="navbar-brand" href="../Home/home.php">
								<span style="vertical-align: middle;font-size: 25px; "><img src="../Pictures/logoS.png" width="30px">cupid</span>
							</a>						
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>					
						<div class="collapse navbar-collapse"  id="menu">
							<ul class="nav navbar-nav hidden-md hidden-sm hidden-xs" style="padding: 0px 0px 0px 50px">
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
								<li><a href="../Logout/logout.php">Log out</a></li>
							</ul>												
						</div>			
					</div>								
				</nav>
			</div>
			<br><br><br>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
					<h3><center><b>Control Panel</b></center></h3>
					<table class="table">
						<thead>
							<tr>
								<th>Machine ID</th>
								<th>State</th>
								<th>Application ID</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($panel_data as $other_data) {
										$state_name = "";

										if($other_data[1] == 0) {
											$state_name = "stopped";
										}
										else if($other_data[1] == 1) {
											$state_name = "running";
										}
										else if($other_data[1] == 2) {
											$state_name = "paused";
										}

										echo "<tr><td>".$other_data[0]."</td><td>".$state_name."</td><td>".$other_data[2]."</td><td class=\"col-md-1\"><button onclick=\"pauseMachine(".$other_data[0].");\" type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\"><span class=\"glyphicon glyphicon-pause\" aria-hidden=\"true\"></span></button></td><td class=\"col-md-1\"><button onclick=\"startMachine(".$other_data[0].");\" type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\"><span class=\"glyphicon glyphicon-play\" aria-hidden=\"true\"></span></button></td><td class=\"col-md-1\"><button  onclick=\"stopMachine(".$other_data[0].");\" type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\"><span class=\"glyphicon glyphicon-stop\" aria-hidden=\"true\"></span></button></td></tr>";
								}
							?>
						</tbody>
					</table>
					<div class="container">
						  <!-- Mudar o data-target para o ID do maiszinho -->
						  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addMachine">
						  	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						  </button>
						  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#rmMachine">
						  	<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
						  </button>
						  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#collaborate">
						 	<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
						  </button>
						  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#descollaborate">
						  	<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
						  </button>
						  
						  <!-- [+] -->
						<div class="modal fade" id="addMachine" role="dialog">
					    	<div class="modal-dialog modal-sm">
					      		<div class="modal-content">
					        		<div class="modal-header">
						        		<button type="button" class="close" data-dismiss="modal">&times;</button>
						    			<h4 class="modal-title">Add new machine</h4>
						    		</div>
						        	<div class="modal-body">
						          		<label>Insert machine IP<input id="ipTextBox"></input></label>
						        	</div>
						        	<div class="modal-footer">
						          		<button name="btnAdd" onclick="addMachine()" class="btn btn-default" data-dismiss="modal" >ADD</button>
						        	</div>
					      		</div>
					    	</div>
						 </div>
						<!-- [-] -->
						<div class="modal fade" id="rmMachine" role="dialog">
						    <div class="modal-dialog modal-sm">
						      	<div class="modal-content">
						        	<div class="modal-header">
						         		<button type="button" class="close" data-dismiss="modal">&times;</button>
						          		<h4 class="modal-title">Remove machine</h4>
						        	</div>
							        <div class="modal-body">
							          	<label>Insert machine ID<input id="machineIDTextBox"></input></label>
							        </div>
							        <div class="modal-footer">
							          	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="rmMachine()">REMOVE</button>
							        </div>
						      	</div>
						    </div>
						</div>  

						<!-- [collaborate] -->
						<div class="modal fade" id="collaborate" role="dialog">
						    <div class="modal-dialog modal-sm">
						      	<div class="modal-content">
						       		<div class="modal-header">
						        		<button type="button" class="close" data-dismiss="modal">&times;</button>
						          		<h4 class="modal-title">Collaborate</h4>
						        	</div>
						        	<div class="modal-body">
						          		<label>Insert machine ID<input id="machineID2TextBox"></input></label>
						          		<label>Insert application ID<input id="appIDTextBox"></input></label>
						        	</div>
						        	<div class="modal-footer">
						          		<button type="button" class="btn btn-default" data-dismiss="modal" onclick="coll()">COLLABORATE</button>
						        	</div>
						      	</div>
						    </div>
						</div>

						<!-- [descollaborate] -->
						<div class="modal fade" id="descollaborate" role="dialog">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
						        	<div class="modal-header">
						          		<button type="button" class="close" data-dismiss="modal">&times;</button>
						          		<h4 class="modal-title">Descollaborate</h4>
						        	</div>
						        	<div class="modal-body">
						          		<label>Insert machine ID<input id="machineID3TextBox"></input></label>
						        	</div>
						        	<div class="modal-footer">
						          		<button type="button" class="btn btn-default" data-dismiss="modal" onclick="descoll()">DESCOLLABORATE</button>
						        	</div>
						      	</div>
						    </div>
						 </div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
					<h3><center><b>Overall Statistics</b></center></h3>
					<center>
						<table class="table" style="width: 55%;">
							<thead>
								<tr>
									<th class="text-left">Name</th>
									<th>Value</th>
								</tr>
							</thead>
							<tbody>
								<?php
									echo "<tr><td class=\"text-left\">Number App Collaborate</td><td>$stats_data[0]</td></tr><tr><td class=\"text-left\">Data Generated</td><td>$stats_data[1]</td></tr><tr><td class=\"text-left\">Processing Time</td><td>$stats_data[2]</td></tr><tr><td class=\"text-left\">Gift Processed</td><td>$stats_data[3]</td></tr>";
								?>												
							</tbody>
						</table>
					</center>
				</div>
			</div>
			<div class="row">
				<h3><b>Application Statistic</b></h3>
	            <div class="panel-group col-md-12 col-sm-12 col-xs-12 col-lg-12" id="accordion">
                	<?php 
                		$i = 0;
						foreach ( $app_data as $data ) {
								echo "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$data[0]."\"><b>#App".$data[0]."</b></a></h4> </div><div id=\"collapse".$data[0]."\" class=\"panel-collapse collapse in\"><div class=\"panel-body\"><table class=\"table table-striped\"><tr><td class=\"text-left\">Progress</td><td class=\"text-left\">".$data[1]."</td></tr><tr><td class=\"text-left\">Remain Process Time</td><td class=\"text-left\">".$data[2]."</td></tr><tr><td class=\"text-left\">Processing Time</td><td class=\"text-left\">".$data[3]."</td></tr><tr><td class=\"text-left\">Data Generated</td><td class=\"text-left\">".$data[4]."</td></tr><tr><td class=\"text-left\">Number of Machines Running</td><td class=\"text-left\">".$data[5]."</td></tr><tr><td class=\"text-left\">Number of Machines Paused</td><td class=\"text-left\">".$data[6]."</td></tr><tr><td class=\"text-left\">Number of Machine Stopped</td><td class=\"text-left\">".$data[7]."</td></tr></table></div></div></div>";
					   		$i++;
					   	}
                	?>
               	</div>
            </div>
			</div>
			<br><br><br>
				<nav class="navbar navbar-default navbar-fixed-bottom show-scroll" style="margin:0% 0% 0% 0%; padding:0%">
					<ul class="nav footer navbar-nav navbar-center">				
						<li><a href="#">terms</a></li>
						<li><a href="#">privacy</a></li>
						<li><a href="#">security</a></li>					
						<li><a href="#">stats</a></li>
						<li><a href="#">credits</a></li>
						<li><a href="#">contact us</a></li>					
					</ul>						
				</nav>	
		</div>		
	</body>
</html>

