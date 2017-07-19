<?php

class Register{

	private $email, $password, $password1;


 	public function __constructor( $email, $password, $password1 ){
		$this->email = $email;
		$this->password = $password;
		$this->password1 = $password1;
	}

	public function Register(){
			 
		if(empty($this->email)){
		  return "Please enter your email address.";

		} else if ( !filter_var($this->email,FILTER_VALIDATE_EMAIL) ) {
		  return "Please enter valid email address.";
		}
		  
		if(empty($this->password)){
		  return "Please enter your password.";
		}

		if(strcmp($this->password,$this->password1) != 0){
		  return "Please enter your password.";
		}
 		$password = hash('sha256', $pass); // password hashing using SHA256

 		$res=mysql_query("INSERT INTO users(userId,userEmail,userPass) VALUES(NULL,'$email','$password')");
 		$row=mysql_fetch_array($res);
 		$count = mysql_num_rows($res); // if pass correct it returns must be 1 row
		if ($res) {
			$errTyp = "success";
			$errMSG = "Successfully registered, you may login now";
			unset($email);
			unset($pass);
			return true;
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later...";	
			return false;
		}	
	}

}
