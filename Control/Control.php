<?php 
 
class Control{

	private $email, $password;

 	public function __constructor( $email, $password ){ // construtor para logar
		$this->email = $email;
		$this->password = $password;
	}

	public function __constructor($email, $password, $password1){ // construtor para registrar 
		$this->email = $email;
		$this->password = $password;
		$this->password1 = $password1;	
	}

	public function LogarUsuario(){
			 
			 require "../Control/User.class.php";
			 $user = new User($this->email, $this->password);
			 $validacoes = $user->Login();
		return $validacoes;
	}

	public function InserirUsuario(){
			require "../Control/Register.class.php";
			$user = new User($this->email, $this->password);
			$validacoes = $user->Login();
		return $validacoes;
	}
}

?>