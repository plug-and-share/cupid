<?php 
 
class ControlPanel{

	private $controlPanelModel;
	private $profile_id;

 	public function __construct ( $profile_id ){
 		$this->profile_id = $profile_id;
 		require "../ControlPanel/ControlPanel.class.php";
	}

	public function ControlP(){		 
		$controlPanelModel = new Control_panel( $this->profile_id );
	 	$data = $controlPanelModel->build();
<<<<<<< HEAD
		return $data;
	}

	public function add_Machine( $ip ){
		$controlPanelModel = new Control_panel( $this->profile_id );
		$result = $controlPanelModel->AddMachine($ip); 
=======
		return $data; // arrumar a pagina do PHP para receber o retorno dessa funcao 	
	}

	public function addMachine( $ip ){
		$controlPanelModel = new Control_panel( $this->profile_id );
		$result = $controlPanelModel->AddMachine($ip); // falta colocar um dialogo para receber esses valores
>>>>>>> 2c31058e0458658f4ce58b80a6c986730596ac91
		return $result;
	}

	public function RMMachine( $machine_id ){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->removeMachine( $machine_id );
		return $result;
	}

	public function CollApp( $application_id, $machine_id ){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->collaborateApp( $application_id, $machine_id );
		return $result;
	}

<<<<<<< HEAD
	public function DescollApp( $machine_id ){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->descollaborateApp( $machine_id );
		return $result;
	}

	public function startMachine( $machine_id ){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->start( $machine_id );
		return $result;
	}

	public function stopMachine( $machine_id ){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->stop( $machine_id );
		return $result;
	}	

	public function pauseMachine( $machine_id ){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->pause( $machine_id );
=======
	public function DescollApp(){
		$controlPanelModel = new Control_panel( $profile_id );
		$result = $controlPanelModel->descollaborateApp( $application_id, $machine_id );
>>>>>>> 2c31058e0458658f4ce58b80a6c986730596ac91
		return $result;
	}
}

?>