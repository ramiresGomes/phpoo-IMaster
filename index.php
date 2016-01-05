<?php

header('Content-type: text/html; charset=UTF-8');

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

include ROOT.DS.'vendor/'.DS.'autoload.php';

try {

	$sql = new Core\BancoDeDados\Instrucoes\Update();

	$sql->setEntity('usuarios')
		->setValues([
			'nome' => 'Ramires Gomes',
			'email' => 'ramires.gb@gmail.com',
			'senha' => '1234'
		])
		->setFilters()
			->where('id', '>', 1);

		var_dump($sql->getSql());


} catch (\Exception $e) {
	$e->getMessage();
}