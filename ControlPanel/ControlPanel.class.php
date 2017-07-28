<?php

class Control_panel {
	private $profile_id;

	public function __construct( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build(){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query1 = "SELECT machine_id,state,app_id FROM mydb.ControlPanel WHERE user_id = $this->profile_id";
		$result = mysqli_query($db, $query1) or die ('Error');
		while($row = mysqli_fetch_array($result)) {
				$rows[] = $row;
		}
		return $rows;
	}

	public function AddMachine($ip){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query = mysqli_query($db, "INSERT INTO mydb.ControlPanel(state, app_id, user_id, IP) VALUES (0, 0, $this->profile_id, '$ip')");
		header("Location: ../Home/home.php");
	}

	public function removeMachine( $machine_id ){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query = mysqli_query($db, "DELETE FROM mydb.ControlPanel WHERE machine_id = $machine_id");
	}

	public function collaborateApp( $application_id, $machine_id ){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$sql = "UPDATE mydb.ControlPanel AS CP, mydb.Application AS A SET CP.app_id = $application_id WHERE CP.machine_id = $machine_id AND A.app_id = $application_id";
		$query = mysqli_query($db,$sql);
		$myfile = fopen("/home/jcanabarro/Desktop/dbg.txt", "w");
		fwrite($myfile, "$application_id 1 $machine_id");
	}

	public function descollaborateApp( $machine_id ){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query = mysqli_query($db,"UPDATE mydb.ControlPanel SET app_id = 0 WHERE machine_id = $machine_id" );
	}

	public function start( $machine_id ){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query = mysqli_query($db,"UPDATE mydb.ControlPanel SET state = 1 WHERE machine_id = $machine_id" );		
	} 

	public function stop( $machine_id ){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query = mysqli_query($db,"UPDATE mydb.ControlPanel SET state = 0 WHERE machine_id = $machine_id" );		
	} 

	public function pause( $machine_id ){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query = mysqli_query($db,"UPDATE mydb.ControlPanel SET state = 2 WHERE machine_id = $machine_id" );		
	} 		
};

?>