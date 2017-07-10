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

		return "<tbody><tr><tdclass=\"text-left\">NumberAppCollaborate</td><td>$number_app_coll</td></tr><tr><tdclass=\"text-left\">DataGenerated</td><td>$data_generated</td></tr><tr><tdclass=\"text-left\">ProcessingTime</td><td>$processing_time</td></tr><tr><tdclass=\"text-left\">GiftProcessed</td><td>$gift_processed</td></tr></tbody>";

	}

};

?>