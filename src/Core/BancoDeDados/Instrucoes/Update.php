<?php

namespace Core\BancoDeDados\Instrucoes;

use Core\BancoDeDados\Instrucao;

final class Update extends Instrucao
{

	public function getSql()
	{
		if (empty($this->entity))
			throw new \Exception("Entidade não declarada");

		$sql = 'UPDATE '.$this->entity.' SET '.$this->values;

		if (!empty($this->filters))
			$sql .= $this->filters->getSql();
		return $sql . ';';
	}

	public function setValues(Array $values = [])
	{
		$keys = array_keys($values);
		$sql = [];

		foreach ($keys as &$key) {
			$sql[] = $key.'=:'.$key;
		}

		$this->values = implode(', ', $sql);

		return $this;
	}

}