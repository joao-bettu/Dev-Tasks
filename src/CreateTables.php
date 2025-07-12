<?php 

namespace Tasks;

use PDO;

class CreateTables { // Apenas cria a tabela de tarefas
    private $pdo;

    public function __construct(PDO $db) {
        $this->pdo = $db;
        $this->criarTabelaTarefas();
    }

    private function criarTabelaTarefas() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS tarefas (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                titulo TEXT,
                descricao TEXT,
                prioridade INTEGER
            )");
    }
}

?>