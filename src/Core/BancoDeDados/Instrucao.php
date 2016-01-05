<?php

namespace Core\BancoDeDados;

abstract class Instrucao
{

	protected $sql, $filters, $entity;

	final public function setEntity($entity)
	{
		if (is_string($entity)) {
			$this->entity = $entity;
			return $this;
		} else {
			throw new \Exception("A entidade deve ser uma string");
		}
	}

	final public function setFilters()
	{
		$this->filters = new Filtros;
		return $this->filters;
	}

	abstract public function getSql();

	abstract public function setValues(Array $values);

}