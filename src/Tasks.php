<?php 

namespace Tasks;

use PDO;
use Tasks\DB;

class Task {
    private array $columns = [
        "id",
        "title",
        "description",
        "priority"
    ];
    // Prioridade númerica: 1 - Baixa, 2 - Médio e 3 - Alta

    private PDO $pdo;
    private string $tabela = 'tarefas';

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function criar(array $dados){
        $colunas = implode(', ', array_keys($dados));
        $valores = ':' . implode(', :', array_keys($dados));
        $sql = "INSERT INTO {$this->tabela} ($colunas) VALUES ($valores)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($dados);
    }
}

?>