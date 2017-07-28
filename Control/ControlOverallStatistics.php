<?php 
 
class ControlOverAll{

	private $profile_id;

 	public function __construct( $profile_id ){
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