<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Tasks\CreateTables;
use Tasks\DB;
use Tasks\Tasks;

$db = DB::conectar();
$criarTabela = new CreateTables($db);

$tarefa_teste = new Tasks($db);

/*$tarefa_teste->criar([
    "titulo" => "Tarefa",
    "descricao" => "Tarefa de Teste",
    "prioridade" => 2
]);*/

/*$tarefa_teste->editar([
    "id" => null,
    "titulo" => "Teste",
    "descricao" => "Amanda",
    "prioridade" => 1
]);*/

//$tarefa_teste->deletar(4);

print_r($tarefa_teste->listar());

?>