<?php

namespace Core\BancoDeDados\Instrucoes;

use Core\BancoDeDados\Instrucao;

final class Select extends Instrucao
{

	private $fields;

	public function setFields(Array $fields)
	{
		$this->fields = implode(', ', $fields);
		return $this;
	}

	public function getSql()
	{
		$this->fields = (empty($this->fields) ? '*' : $this->fields);

		if (empty($this->entity))
			throw new \Exception("Entidade não declarada");

		$sql = 'SELECT '.$this->fields.' FROM '.$this->entity;

		if (!empty($this->filters))
			$sql .= $this->filters->getSql();
		return $sql . ';';
	}

	public function setValues(Array $values = [])
	{
		throw new Exception("Você não pode chamar o setValues em um Select");
	}

}