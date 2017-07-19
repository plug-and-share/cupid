<?php

class Application_statistic {
	private $profile_id;
	
	public function __construct( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build(){
		// $progress = rand( 0 , 100 );
		// $remain_process_time = rand( 0 , 100 );
		// $processing_time = rand( 0 , 100 );
		// $data_generated = rand( 0 , 100 );
		// $num_machines_run = rand( 0 , 100 );
		// $num_machines_pause = rand( 0 , 100 );
		// $num_machines_stop = rand( 0 , 100 );

		$statistics = array
		(
			array(rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)),
			array(rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)),
			array(rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100))
		);
		return $statistics;
	}

};
?>
