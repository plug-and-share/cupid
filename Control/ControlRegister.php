<?php 
 
class Control{

	private $email, $password, $password1;

	public function __constructor($email, $password, $password1){ // construtor para registrar 
		$this->email = $email;
		$this->password = $password;
		$this->password1 = $password1;	
	}

	public function InserirUsuario(){
			require "../Register/Register.class.php";
			$user = new Register($this->email, $this->password, $this->password1);
			$validacoes = $user->Register();
		return $validacoes;
	}
}

?>