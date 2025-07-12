<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Tasks\CreateTables;
use Tasks\DB;
use Tasks\Tasks;

$db = DB::conectar();
$criarTabela = new CreateTables($db);

$tarefa_teste = new Tasks($db);

switch ($_GET["type"]){
    case "criar":
        break;
    case "editar":
        break;
    case "listar":
        break;
    case "deletar";
        break;
    default:
        echo "Parâmetro inválido\n";
        break;
}

?>