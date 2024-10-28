var buttonCount = 0;
document.addEventListener("DOMContentLoaded", () => {
    const botaoContainer = document.getElementById("botao-container");
    const buttons = botaoContainer.querySelectorAll("button");
    const btnAcesso = document.getElementById("btn-acesso");
    btnAcesso.disabled = true;
    buttonCount = buttons.length; 

    buttons.forEach(button => {
        button.addEventListener("click", function() {
            liberar(this);
        });
    });

    btnAcesso.addEventListener("click", function() {
        abrirLink(btnAcesso.value);
    });


    function liberar(btn){
        buttonCount--;
        
        abrirLink(btn.value);
        
        btn.style.backgroundColor = "#0fde24";
        setTimeout(() => {
            btn.disabled = true;
            liberarAcesso(); 
        }, 2000);
        
    }


    function liberarAcesso(){
        if(buttonCount < 1){
            btnAcesso.style.backgroundColor = "#0fde24";
            btnAcesso.innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"25\" height=\"25\" fill=\"currentColor\" class=\"bi bi-lock\" viewBox=\"0 0 16 16\"> <path d=\"M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2M3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1z\"/></svg>Acesso liberado";
            btnAcesso.disabled = false;
        }
    }
});

function abrirLink(url) {
    window.open(url, '_blank');
}
