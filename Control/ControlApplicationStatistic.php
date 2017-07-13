<?namespace application php 
 
class Control{

	private $profile_id;

 	public function __constructor( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function ApplicationStatistic(){
			 
	 	require "../ControlPanel/ApplicationStatistic.class.php";
	 	$AppS = new ApplicationStatistic( $this->profile_id );
	 	$data = $AppS->build();
	 return $data; // arrumar a pagina do PHP para receber o retorno dessa funcao 	
	}
}

?>