<?php

	require "../Control/ControlControlPanel.php";
	require "../Control/ControlOverallStatistics.php";
	require "../Control/ControlApplicationStatistic.php";


	$panel = new panel::Control( $_SESSION['user'] ); // Criar um metodo para pegar id
	$statistic = new statistic::Control( $_SESSION['user'] );
	$application = new application::Control( $_SESSION['user'] );

	$app_data = $application->ApplicationStatistic();
	$stats_data = $statistic->OverAllStatistics();
	$panel_data = $panel->ControlPanel();

	// app_data = [
	// 	  progress1, remain1, proc1, data1, run1, pause1, stop1
	// 	  progress2, remain2, proc2, data2, run2, pause2, stop2
	//    ...
	// 	  progressN, remainN, procN, dataN, runN, pauseN, stopN
	// ]
	foreach ( $app_data as $data ) {
		echo "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\"><b>#App1</b></a></h4> </div><div id=\"collapseOne\" class=\"panel-collapse collapse in\"><div class=\"panel-body\"><table class=\"table table-striped\"><tr><td class=\"text-left\">Progress</td><td class=\"text-left\">$data[0]</td></tr><tr><td class=\"text-left\">Remain Process Time</td><td class=\"text-left\">$data[1]</td></tr><tr><td class=\"text-left\">Processing Time</td><td class=\"text-left\">$data[2]</td></tr><tr><td class=\"text-left\">Data Generated</td><td class=\"text-left\">$data[3]</td></tr><tr><td class=\"text-left\">Number of Machines Running</td><td class=\"text-left\">$data[4]</td></tr><tr><td class=\"text-left\">Number of Machines Paused</td><td class=\"text-left\">$num_machines_pause</td></tr><tr><td class=\"text-left\">Number of Machine Stopped</td><td class=\"text-left\">$data[5]</td></tr></table></div></div></div>";
   	}

   	/*
	statistic = [
		n_app_collaborated1, data_generated1, processing_time1, gift_processed1
		n_app_collaborated2, data_generated2, processing_time2, gift_processed2
		...
		n_app_collaboratedN, data_generatedN, processing_timeN, gift_processedN
	]
   	*/
	foreach ( $statistic_data as $data ) {
		echo "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\"><b>#App1</b></a></h4> </div><div id=\"collapseOne\" class=\"panel-collapse collapse in\"><div class=\"panel-body\"><table class=\"table table-striped\"><tr><td class=\"text-left\">Progress</td><td class=\"text-left\">$data[0]</td></tr><tr><td class=\"text-left\">Remain Process Time</td><td class=\"text-left\">$data[1]</td></tr><tr><td class=\"text-left\">Processing Time</td><td class=\"text-left\">$data[2]</td></tr><tr><td class=\"text-left\">Data Generated</td><td class=\"text-left\">$data[3]</td></tr><tr><td class=\"text-left\">Number of Machines Running</td><td class=\"text-left\">$data[4]</td></tr><tr><td class=\"text-left\">Number of Machines Paused</td><td class=\"text-left\">$num_machines_pause</td></tr><tr><td class=\"text-left\">Number of Machine Stopped</td><td class=\"text-left\">$data[5]</td></tr></table></div></div></div>";
   	}

   	/*
	panel = [
		machine_id1, state1, application_id1
		machine_id2, state2, application_id2
		...
		machine_idN, stateN, application_idN
	]
   	*/
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
								<li><a href="../Login/login.php">Sign in</a></li>
								<li><a href="../Register/register.php">Sign up</a></li>
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
							<tr>
								<td>0</td>
								<td>paused</td>
								<td>0</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>0</td>
								<td>paused</td>
								<td>0</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>0</td>
								<td>paused</td>
								<td>0</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>0</td>
								<td>paused</td>
								<td>0</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
									</button>
								</td>
								<td class="col-md-1">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
									</button>
								</td>
							</tr>													
						</tbody>
					</table>
				
					<button title="Add Machine" type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
					<button title="Remove Machine" type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
					</button>
					<button title="Collaborate" type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
					</button>
					<button title="Descollaborate" type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
					</button>
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
								<tr>
									<td class="text-left">Number App Collaborate</td>
									<td>500</td>
								</tr>
								<tr>
									<td class="text-left">Data Generated</td>
									<td>500</td>
								</tr>
								<tr>
									<td class="text-left">Processing Time</td>
									<td>500</td>
								</tr>
								<tr>
									<td class="text-left">Gift Processed</td>
									<td>500</td>
								</tr>												
							</tbody>
						</table>
					</center>
				</div>
			</div>
			<div class="row">
				<h3><b>Application Statistic</b></h3>
				<hr>
	            <div class="panel-group col-md-12 col-sm-12 col-xs-12 col-lg-12" id="accordion">
                	<div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">
	                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>#App1</b></a>
	                        </h4> 
	                    </div>
	    				<div id="collapseOne" class="panel-collapse collapse in">
	                        <div class="panel-body">
	                            <table class="table table-striped">
	                                <tr>
	                                    <td class="text-left">Progress</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Remain Process Time</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Processing Time</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Data Generated</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Number of Machines Running</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Number of Machines Paused</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Number of Machine Stopped</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                             </table>
	                        </div>
	                	</div>
	                </div>
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">
	                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><b>#App2</b></a>
	                        </h4> 
	                    </div>
	    				<div id="collapseTwo" class="panel-collapse collapse in">
	                        <div class="panel-body">
	                            <table class="table table-striped">
	                                <tr>
	                                    <td class="text-left">Progress</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Remain Process Time</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Processing Time</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Data Generated</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Number of Machines Running</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Number of Machines Paused</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                                <tr>
	                                    <td class="text-left">Number of Machines Stopped</td>
	                                    <td class="text-left">500</td>
	                                </tr>
	                             </table>
	                        </div>
	                	</div>
	                </div>
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

