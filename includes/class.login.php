<?php

class Login{

	private $dados;
	
	private $erro = array();
	
	public function set($valor, $nome){
		$this->dados = array('valor' => trim($valor), 'nome' => $nome);
		return $this;
	}
			
	public function obrigatorio(){
	
		if(empty($this->dados['valor'])){
			$this->erro[] = '<strong>Erro:</strong> O campo de '.$this->dados['nome'].' est&aacute; vazio.';
		}
		
		return $this;
	
	}
	
	public function validar(){
		
		if(count($this->erro) > 0){
			return false;
		}else{
			return true;
		}
		
	}

	
	public function erros(){
		return $this->erro;
	}
	
	

}





?>