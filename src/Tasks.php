<?php 

namespace Tasks;

use PDO;
use PDOException;
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
        try {
            $colunas = implode(', ', array_keys($dados));
            $valores = ':' . implode(', :', array_keys($dados));
            $sql = "INSERT INTO {$this->tabela} ($colunas) VALUES ($valores)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($dados);
        } catch (PDOException $e) {
            echo "Erro criando tarefa: " . $e->getMessage() . PHP_EOL;   
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro listando as tarefas: " . $e->getMessage() . PHP_EOL;
        }
    }

    public function editar(array $dados){
        
    }

    public function deletar($id) {
        
    }
    
}

?>