
const formulario = document.getElementById("form-contato");

if (formulario) {

    formulario.addEventListener("submit", function(event) {

        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const mensagem = document.getElementById("mensagem").value.trim();

        // Verificar se todos os campos foram preenchidos
        if (nome === "" || email === "" || mensagem === "") {
            event.preventDefault();
            alert("Por favor, preencha todos os campos.");
            return;
        }

        // Verificar se o e-mail possui um formato válido
        const formatoEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!formatoEmail.test(email)) {
            event.preventDefault();
            alert("Digite um e-mail válido.");
            return;
        }

        // Verificar o tamanho da mensagem
        if (mensagem.length < 10) {
            event.preventDefault();
            alert("Escreva uma mensagem com pelo menos 10 caracteres.");
            return;
        }

    });

}
