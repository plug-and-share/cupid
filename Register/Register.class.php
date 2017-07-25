<?php

class Register{

	private $email, $password, $password1;


 	public function __construct ( $email, $password, $password1 ){
		$this->email = $email;
		$this->password = $password;
		$this->password1 = $password1;
	}

	public function Registrar(){
		require_once "../Connection/dbconnect.php";

		if(empty($this->email)){
		  return "Please enter valid email address.";

		} else if ( !filter_var($this->email,FILTER_VALIDATE_EMAIL) ) {
		  return "Please enter valid email address.";
		}
		  
		if(empty($this->password)){
		  return "Please enter your password.";
		}

		if(strcmp($this->password,$this->password1) != 0){
		  return "Please enter your password.";
		}

		$this->email = mysqli_real_escape_string($db, $this->email);
		$this->password = mysqli_real_escape_string($db, $this->password);
		$this->password1 = mysqli_real_escape_string($db, $this->password1);
		
		$sql = "SELECT email FROM mydb.User WHERE email='$this->email'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		 
		if(mysqli_num_rows($result) == 1){
			return false;			
		}else{
			$this->password = md5($this->password);
		 	$query = mysqli_query($db, "INSERT INTO mydb.User(email, password, university)VALUES ('$this->email', '$this->password', 'UNIOESTE')");
			if($query){
				unset($this->email);
				unset($this->password);
				unset($this->password1);
				return true;
			}else
				return false;
			}
	}

}
