<? namespace panel php 
 
class Control{

	private $controlPanelModel;

 	public function __constructor( $profile_id ){
		$this->controlPanelModel = new ControlPanel( $profile_id );
	 	require "../ControlPanel/ControlPanel.class.php";

	}

	public function ControlPanel(){		 
	 	$data = $this->controlPanelModel->build();
		return $data; // arrumar a pagina do PHP para receber o retorno dessa funcao 	
	}

	public function AddMachine( $ip, $key ){
		$result = $this->controlPanelModel->addMachine($ip, $key); // falta colocar um dialogo para receber esses valores
		return $result;
	}

	public function RMMachine( $machine_id ){
		$result = $this->controlPanelModel->removeMachine( $machine_id );
		return $result;
	}

	public function CollApp( $application_id, $machine_id ){
		$result = $this->controlPanelModel->collaborateApp( $application_id, $machine_id );
		return $result;
	}

	public function DescollApp(){
		$result = $this->controlPanelModel->descollaborateApp( $application_id, $machine_id );
		return $result;
	}
}

?>