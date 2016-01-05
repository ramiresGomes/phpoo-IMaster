<?php

namespace Core\BancoDeDados;

class BancoDeDados
{

	private $config, $pdo;

	public function __construct(Array $config)
	{
		$this->config = $config;
		$this->validaConexao();
	}

	public function conecta()
	{
		try {
			$this->pdo = new \PDO(
				'mysql:host='.$this->config['servidor'].';dbname='.$this->config['banco'],
				$this->config['usuario'],
				$this->config['senha'],
				$this->config['opcoes']
			);
		} catch (\PDOException $e) {
			throw new \Exception('Falha na conexão. Erro: '.$e->getCode(). '! Mensagem: '.$e->getMessage());
		}
		return $this->pdo;
	}

	private function validaConexao()
	{
		if (is_array($this->config)) {
			if (empty($this->config['servidor']))
				throw new \Exception('Servidor não informado');
			if (empty($this->config['banco']))
				throw new \Exception('Banco de dados não informado');
			if (empty($this->config['usuario']))
				throw new \Exception('Usuário não informado');
			if (empty($this->config['senha']))
				throw new \Exception('Senha não informada');
			if (empty($this->config['opcoes']) and !is_array($this->config['opcoes']))
				throw new \Exception('Opções não informadas ou não é um array. Item obrigatório mesmo que vazio!');
			return true;
		}
		throw new \Exception('Configuração inválida!');
	}

	public function executa()
	{
		$select = $this->pdo->prepare('SELECT * FROM usuarios WHERE nome = :nome;');
		$select->bindValue(':nome', $_GET['nome']);
		$select->execute();
		return $select->fetchAll(\PDO::FETCH_ASSOC);
	}
}