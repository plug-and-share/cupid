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
		$query = mysqli_query($db, "INSERT INTO mydb.ControlPanel(state, app_id, machine_id, user_id, IP) VALUES (0, 0, 1, $this->profile_id, '$ip')");
		header("Location: ../Home/home.php");
	}

	public function removeMachine( $machine_id ){
		echo "DELETE FROM Machine WHERE MachineID == $machine_id";
	}

	public function collaborateApp( $application_id, $machine_id ){
		echo "UPDATE Control Panel SET ApplicationID = $ApplicationID MachineID = NULL";
		echo "INSERT INTO Application( INT ip ) VALUE( $ip );";
	}

	public function descollaborateApp( $application_id, $machine_id ){
		echo "UPDATE Control Panel SET ApplicationID = NULL WHERE ApplicationID = $application_id;";
	}
};

?>