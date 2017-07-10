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

			if( $count == 1 && $row['userPass'] == $this->password ) {
		 		$password = hash('sha256', $pass); // password hashing using SHA256
		
		 		$res=mysql_query("SELECT userId, userPass FROM users WHERE userEmail='$email'");
		 		$row=mysql_fetch_array($res);
		 		$count = mysql_num_rows($res); // if pass correct it returns must be 1 row
				return true;
				
			} else {
			    return "Incorrect Credentials, Try again...";
			}    
	 

	}
}

?>
