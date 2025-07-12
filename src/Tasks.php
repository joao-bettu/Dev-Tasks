<?php 

namespace Tasks;

use PDO;
use PDOException;
use Tasks\DB;

class Tasks {
    private array $columns = [
        "id",
        "titulo",
        "descricao",
        "prioridade"
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
        try {
            if (!isset($dados['id'])) {
                throw new \Exception("ID não informado para edição.");
            }

            $id = $dados['id'];
            unset($dados['id']);

            $set = implode(', ', array_map(fn($col) => "$col = :$col", array_keys($dados)));
            $sql = "UPDATE {$this->tabela} SET $set WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            
            $dados['id'] = $id;
            return $stmt->execute($dados);
        } catch (PDOException $e) {
            echo "Erro editando tarefa: " . $e->getMessage() . PHP_EOL;
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage() . PHP_EOL;
        }
    }

    public function deletar($id) {
        try {
            $sql = "DELETE FROM {$this->tabela} WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro deletando tarefa: " . $e->getMessage() . PHP_EOL;
        }
    }
}

?>