<?php 

namespace Tasks;

class Task {
    private int $id;
    private string $title;
    private string $description;
    private int $priority; // Prioridade númerica: 1 - Baixa, 2 - Médio e 3 - Alta

    public function __construct($id, $titulo, $info, $prioridade){
        $this->id = $id;
        $this->title = $titulo;
        $this->description = $info;
        $this->priority = $prioridade;        
    }
}

?>