<?php

namespace Core\BancoDeDados;

final class Filtros
{
	private $sql;

	public function where($column, $operator, $value)
	{
		$this->sql['where'][] = $column.$operator.':'.$column;
		return $this;
	}

	public function whereOperator($operator)
	{
		$this->sql['where'][] = $operator;
		return $this;
	}

	public function limit($limit)
	{
		$this->sql['limit'] = $limit;
		return $this;
	}

	public function orderBy($order)
	{
		$this->sql['order'] = $order;
		return $this;
	}

	public function getSql()
	{
		$sql = [];
		if (!empty($this->sql['where'])) {
			$sql_string = ' WHERE ';
			$sql_string .= implode(' ', $this->sql['where']);
			$sql[] = $sql_string;
		}

		if (!empty($this->sql['order'])) {
			$sql_string = ' ORDER BY '.$this->sql['order'];
			$sql[] = $sql_string;
		}

		if (!empty($this->sql['limit'])) {
			$sql_string = ' LIMIT '.$this->sql['limit'];
			$sql[] = $sql_string;
		}

		return implode(' ', $sql);
	}
}