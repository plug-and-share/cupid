<?php


class OverallStatistics {
	private $profile_id;
	
	public function __construct ( $profile_id ){
		$this->profile_id = $profile_id;
	}

	public function build(){
		require_once "../Connection/dbconnect.php";
		
		$connect1 = "SELECT number_app_coll FROM mydb.OverAllStatistics WHERE user_id='$this->profile_id'";
		$result1 = mysqli_query($db,$connect1) or die ('Error');
		$row1=mysqli_fetch_array($result1);
		$number_app_coll = $row1[0];
		
		$connect2 =  "SELECT data_generated FROM mydb.OverAllStatistics WHERE user_id='$this->profile_id' limit 1";
		$result2 = mysqli_query($db,$connect2) or die ('Error');
		$row2=mysqli_fetch_array($result2);
		$data_generated = $row2[0];
		
		$connect3 = "SELECT processing_time FROM mydb.OverAllStatistics WHERE user_id='$this->profile_id' limit 1";
		$result3 = mysqli_query($db,$connect3) or die ('Error');
		$row3=mysqli_fetch_array($result3);
		$processing_time = $row3[0];
		
		$connect4 =  "SELECT gift_processed FROM mydb.OverAllStatistics WHERE user_id='$this->profile_id' limit 1";
		$result4 = mysqli_query($db,$connect4) or die ('Error');
		$row4 = mysqli_fetch_array($result4);
		$gift_processed = $row4[0];

		$statistics = array(
			$number_app_coll, $data_generated, $processing_time, $gift_processed
		);
		return $statistics;
	}

};

?>
