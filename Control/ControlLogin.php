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
			 
>>>>>>> c39c0b63e4e394fb954438d22e3346fe9285ee0d
			 require "../Login/User.class.php";
			 $user = new User($this->email, $this->password);
			 $validacoes = $user->Login();
		return $validacoes;
	}
}

?>