<?php

class Application_statistic {
	private $profile_id;
	
	public function __construct( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build(){
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'Omap2014');
		define('DB_DATABASE', 'mydb');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query1 = "SELECT app_id, progress, remain_process_time, processing_time, data_generated, number_machines_running, number_machines_paused, number_machines_stopped  FROM mydb.Application WHERE user_id = $this->profile_id";
		$result = mysqli_query($db, $query1) or die ('Error');
		while($row = mysqli_fetch_array($result)) {
				$rows[] = $row;
		}
		return $rows;
	}

};
?>
