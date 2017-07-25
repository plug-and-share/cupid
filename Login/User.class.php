<?php

class User{

	private $email, $password;


 	public function __construct ( $email, $password ){
		$this->email = $email;
		$this->password = $password;
	}

	public function Login(){
			require_once "../Connection/dbconnect.php"; 
			session_start(); 
		 	if(empty($this->email)){
				return "Please enter your email address.";

			} else if ( !filter_var($this->email,FILTER_VALIDATE_EMAIL) ) {
			   return "Please enter valid email address.";
			}
			  
			if(empty($this->password)){
			   return "Please enter your password.";
			}

			$this->email = mysqli_real_escape_string($db, $this->email);
			$this->password = mysqli_real_escape_string($db, $this->password);
			$this->password = md5($this->password);

			$sql = "SELECT user_id FROM mydb.User WHERE email='$this->email' limit 1";
			$result = mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result);
			$value = $row[0];
			$_SESSION['user'] = $value;
			if($result == 1)
				return $value;
			else
				return true;				
	}
}

?>
