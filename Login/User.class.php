<?php

class User{

	private $email, $password;


 	public function __constructor( $email, $password ){
		$this->email = $email;
		$this->password = $password;
	}

	public function Login(){
			 
			  if(empty($this->email)){
			   return "Please enter your email address.";

			  } else if ( !filter_var($this->email,FILTER_VALIDATE_EMAIL) ) {
			   return "Please enter valid email address.";
			  }
			  
			  if(empty($this->password)){
			   return "Please enter your password.";
			  }

			$password = hash('sha256', $pass); // password hashing using SHA256
			require_once "../Connection/dbconnect.php";
	 		$res=mysql_query("SELECT user_id, password FROM User WHERE email='$email'");
	 		$row=mysql_fetch_array($res);
	 		$count = mysql_num_rows($res); // if pass correct it returns must be 1 row
			return true;	
			
			// return "Incorrect Credentials, Try again...";    
	}
}

?>
