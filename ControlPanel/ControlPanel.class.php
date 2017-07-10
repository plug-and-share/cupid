<?php

class ControlPanel {
	private $profile_id;

	public function __construct( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build( ){
		$row = "";
		$machine_id = 5;
		$state = "dinheirinho";
		$aplication_id = 666;
		for( $i = 0; $i < 5; $i++ ){
			$row .= "<tr><td>$machine_id</td><td>$state</td><td>$aplication_id</td><td class=\"col-md-1\"><button type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\"><span class=\"glyphicon glyphicon-pause\" aria-hidden=\"true\"></span></button></td><td class=\"col-md-1\"><button type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\"><span class=\"glyphicon glyphicon-play\" aria-hidden=\"true\"></span></button></td><td class=\"col-md-1\"><button type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\"><span class=\"glyphicon glyphicon-stop\" aria-hidden=\"true\"></span></button></td></tr>";
			$row .= "SELECT FROM Machine WHERE ControlPanelID == $i";
		}
		return $row;
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