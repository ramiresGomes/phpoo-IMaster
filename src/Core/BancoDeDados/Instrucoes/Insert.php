<?php

namespace Core\BancoDeDados\Instrucoes;

use Core\BancoDeDados\Instrucao;

final class Insert extends Instrucao
{

	private $values;

	public function getSql()
	{
		if (empty($this->entity))
			throw new \Exception("Entidade não declarada");

		$sql = 'INSERT INTO '.$this->entity.' '.$this->values.';';
		return $sql;
	}

	public function setValues(Array $values = [])
	{
		$keys = array_keys($values);
		$columns = implode(', ', $keys);
		$values = implode(', :', $keys);

		$this->values = '('.$columns.') VALUES (:'.$values.')';

		return $this;
	}
}