document.addEventListener("DOMContentLoaded", () => {
    console.log("Dom content loaded");

    const cadastrar = document.getElementById("button-cadastrar");
    const editar = document.getElementById("button-editar");
    const listar = document.getElementById("button-listar");

    const sections = document.getElementsByClassName("hidden");
    const selecionada = document.getElementsByClassName("checkbox");

    function hideShownSections(index, sections) {
        for (let i = 0; i < sections.length; i++){
            if (i===index){
                sections[i].style.display = "block";
            } else {
                sections[i].style.display = "none";
            }
        }
    }

    cadastrar.addEventListener("click", (event) => {
        event.preventDefault();
        hideShownSections(0, sections);
    })

    editar.addEventListener("click", (event) => {
        event.preventDefault();
        hideShownSections(1, sections);

        for(let i = 0; i < selecionada.length; i++){
            if(selecionada[i].value == "selected"){
                selectedTask = selecionada[i].closest("tr");
                break;
            }
        }

        let prioridade;
        if (selectedTask[4].textContent == "Baixa"){
            prioridade = 1;
        } else if(selectedTask[4].textContent == "Média") {
            prioridade = 2;
        } else {
            prioridade = 3
        }

        const tarefa = {
                    "id": selectedTask[1].textContent,
                    "titulo": selectedTask[2].textContent,
                    "descricao": selectedTask[3].textContent,
                    "prioridade": prioridade
                }

        const edit_titulo = document.getElementById("titulo-edit");
        const edit_descricao = document.getElementById("descricao-edit");
        const edit_prioridade = document.getElementsByName("prioridade-edit");

        edit_titulo.textContent = tarefa.titulo;
        edit_descricao.textContent = tarefa.descricao;
        edit_prioridade[tarefa.prioridade-1].click();

    })

    listar.addEventListener("click", (event) => {
        event.preventDefault();
        hideShownSections(2, sections);
    })

    const cancelarCriacao = document.getElementById("cancelar");

    cancelarCriacao.addEventListener("click", (event) => {
        event.preventDefault();
        const form = document.getElementById("form-cadastro");
        form.reset();
        hideShownSections(-1, sections);
    })
    
});