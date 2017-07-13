<?php

class ApplicationStatistic {
	private $profile_id;
	
	public function __constructor(){
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

		$statistics = array()
			array(), // process
			array(), // remain process time
			array(), // processing time
			array(), // data generated
			array(), // run
			array(), // pause
			array() // stop
		);
		return $statistics;
	}

};
?>
