<?php


class OverallStatistics {
	private $profile_id;
	
	public function __constructor( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build(){
		$number_app_coll = rand(0, 100);
		$data_generated = rand(0, 100);
		$processing_time = rand(0, 100);
		$gift_processed = rand(0, 100);


		$statistics = array(
			rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100) 
		);
		return $statistics;
	}

};

?>
