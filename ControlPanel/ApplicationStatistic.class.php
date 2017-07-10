<?php

class ApplicationStatistic {
	private $profile_id;
	
	public function __constructor(){
		$this->profile_id = $profile_id;
	}

	public function build(){
		$progress = rand( 0 , 100 );
		$remain_process_time = rand( 0 , 100 );
		$processing_time = rand( 0 , 100 );
		$data_generated = rand( 0 , 100 );
		$num_machines_run = rand( 0 , 100 );
		$num_machines_pause = rand( 0 , 100 );
		$num_machines_stop = rand( 0 , 100 );

		$row = "";
		for( $i = 0; $i < 5; $i++ ){

			$row .= "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\"><b>#App1</b></a></h4> </div><div id=\"collapseOne\" class=\"panel-collapse collapse in\"><div class=\"panel-body\"><table class=\"table table-striped\"><tr><td class=\"text-left\">Progress</td><td class=\"text-left\">$progress</td></tr><tr><td class=\"text-left\">Remain Process Time</td><td class=\"text-left\">$remain_process_time</td></tr><tr><td class=\"text-left\">Processing Time</td><td class=\"text-left\">$processing_time</td></tr><tr><td class=\"text-left\">Data Generated</td><td class=\"text-left\">$data_generated</td></tr><tr><td class=\"text-left\">Number of Machines Running</td><td class=\"text-left\">$num_machines_run</td></tr><tr><td class=\"text-left\">Number of Machines Paused</td><td class=\"text-left\">$num_machines_pause</td></tr><tr><td class=\"text-left\">Number of Machine Stopped</td><td class=\"text-left\">$num_machines_stop</td></tr></table></div></div></div>";
		
		}

		return $row;

	}	

};

?>
