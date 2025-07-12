<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Tasks\CreateTables;
use Tasks\DB;
use Tasks\Tasks;

$db = DB::conectar();
$criarTabela = new CreateTables($db);

$tarefas = new Tasks($db);

$tarefas->criar([
    "titulo" => "Almoçar",
    "descricao" => "Tarefa de Teste",
    "prioridade" => 3
]);

$tarefas->editar([
    "id" => 6,
    "titulo" => "Teste",
    "descricao" => "Teste de edição",
    "prioridade" => 1
]);

print_r($tarefas->listar());

$tarefas->deletar(5);
?>