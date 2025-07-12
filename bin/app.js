document.addEventListener("DOMContentLoaded", () => {
    console.log("Dom content loaded");

    const cadastrar = document.getElementById("button-cadastrar");
    const editar = document.getElementById("button-editar");
    const listar = document.getElementById("button-listar");

    const sections = document.getElementsByClassName("hidden");

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