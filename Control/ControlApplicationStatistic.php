<?php 
 
class ControlApp{

	private $profile_id;

 	public function __construct ( $profile_id ){
 		require "../ControlPanel/ApplicationStatistic.class.php";
		$this->profile_id = $profile_id;
	}

	public function ApplicationStatistic(){
			 
	 	$AppS = new Application_statistic( $this->profile_id );
	 	$data = $AppS->build();
	 return $data; // arrumar a pagina do PHP para receber o retorno dessa funcao 	
	}
}

?>