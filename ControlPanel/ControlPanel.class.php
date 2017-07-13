<?php

class ControlPanel {
	private $profile_id;

	public function __construct( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build( ){
		$machine_id = 5;
		$state = "dinheirinho";
		$aplication_id = 666;	
	}

	public function addMachine( $ip, $key ){
		echo "INSERT INTO Machine( INT ip ) VALUE( $ip );";
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