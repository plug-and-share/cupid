<?php 
 
class Control{

	private $email, $password;

 	public function __construct ( $email, $password ){ // construtor para logar
		$this->email = $email;
		$this->password = $password;
	}

	public function LogarUsuario(){
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
			 
>>>>>>> c39c0b63e4e394fb954438d22e3346fe9285ee0d
>>>>>>> 2c31058e0458658f4ce58b80a6c986730596ac91
			 require "../Login/User.class.php";
			 $user = new User($this->email, $this->password);
			 $validacoes = $user->Login();
		return $validacoes;
	}
}

?>