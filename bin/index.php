<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Tasks\CreateTables;
use Tasks\DB;
use Tasks\Tasks;

$db = DB::conectar();
$criarTabela = new CreateTables($db);

$tarefas = new Tasks($db);

$type = $_GET["type"] ?? null;

switch ($type){
     case "criar":
        $dados = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'prioridade' => $_POST['prioridade']
        ];
        $tarefas->criar($dados);
        echo "Tarefa criada com sucesso.";
        break;
    case "editar":
        case "editar":

        $dados = [
            'id' => $_POST['id'],
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'prioridade' => $_POST['prioridade']
        ];
        $tarefas->editar($dados);
        echo "Tarefa editada com sucesso.";
        break;

    case "listar":
         case "listar":
        $lista = $tarefas->listar();
        echo "<pre>";
        print_r($lista);
        echo "</pre>";
        break;
    case "deletar";
    $id = $_GET['id'] ?? null;
        if ($id) {
            $tarefas->deletar($id);
            echo "Tarefa deletada com sucesso.";
        } else {
            echo "ID não informado para deletar.";
        }
        break;
    default:
        echo "Parâmetro inválido\n";
        break;
}

?>