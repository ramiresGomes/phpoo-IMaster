<?php

namespace Core\BancoDeDados\Instrucoes;

use Core\BancoDeDados\Instrucao;

final class Delete extends Instrucao
{
	public function getSql()
	{
		if (empty($this->entity))
			throw new \Exception("Entidade não declarada");

		$sql = 'DELETE FROM '.$this->entity;

		if (!empty($this->filters))
			$sql .= $this->filters->getSql();
		return $sql . ';';
	}

	public function setValues(Array $values = [])
	{
		throw new Exception("Você não pode chamar o setValues em um Delete");
	}
}