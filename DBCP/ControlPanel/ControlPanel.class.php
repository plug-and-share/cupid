<?php

class Control_panel {
	private $profile_id;

	public function __construct( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build(){
		$data = array(
			array(5, "dinheirinho", 666),
			array(2, "pobrinnho", 6123),
			array(4, "dividazinha", 6123)
		);
		return $data;
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