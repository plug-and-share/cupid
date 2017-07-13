<? namespace statistic php 
 
class Control{

	private $profile_id;

 	public function __constructor( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function OverAllStatistics(){
			 
	 	require "../ControlPanel/OverallStatistics.class.php";
	 	$AppS = new OverallStatistics( $this->profile_id );
	 	$data = $AppS->build();
	 return $data; // arrumar a pagina do PHP para receber o retorno dessa funcao 	
	}
}

?>