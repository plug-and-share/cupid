<?php 
 
class Control{

	private $email, $password;

 	public function __constructor( $email, $password ){ // construtor para logar
		$this->email = $email;
		$this->password = $password;
	}

	public function LogarUsuario(){
			 
			 require "../Login/User.class.php";
			 $user = new User($this->email, $this->password);
			 $validacoes = $user->Login();
		return $validacoes;
	}
}

?>