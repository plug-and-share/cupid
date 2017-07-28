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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2c31058e0458658f4ce58b80a6c986730596ac91
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
<<<<<<< HEAD
=======
=======
			  }

			$password = hash('sha256', $pass); // password hashing using SHA256
			require_once "../Connection/dbconnect.php";
	 		$res=mysql_query("SELECT user_id, password FROM User WHERE email='$email'");
	 		$row=mysql_fetch_array($res);
	 		$count = mysql_num_rows($res); // if pass correct it returns must be 1 row
			return true;	
			
			// return "Incorrect Credentials, Try again...";    
>>>>>>> c39c0b63e4e394fb954438d22e3346fe9285ee0d
>>>>>>> 2c31058e0458658f4ce58b80a6c986730596ac91
	}
}

?>
