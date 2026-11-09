
<?php
$erro = "";
$nome = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");

    // Verificar se todos os campos foram preenchidos
    if ($nome === "" || $email === "" || $mensagem === "") {
        $erro = "Preencha todos os campos.";

    // Verificar o tamanho do nome
    } elseif (strlen($nome) < 2) {
        $erro = "O nome precisa ter pelo menos 2 caracteres.";

    // Verificar o formato do e-mail
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Digite um e-mail válido.";

    // Verificar o tamanho da mensagem
    } elseif (strlen($mensagem) < 10) {
        $erro = "Sua mensagem precisa ter pelo menos 10 caracteres.";

    // Limitar o tamanho da mensagem
    } elseif (strlen($mensagem) > 1000) {
        $erro = "Sua mensagem não pode ultrapassar 1000 caracteres.";
    }

} else {
    $erro = "Acesse esta página pelo formulário de contato.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Renan Pinheiro BJJ</title>

    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 60px 20px;
        }

        .mensagem {
            max-width: 500px;
            margin: auto;
            padding: 35px;
            background-color: #222;
            border-radius: 12px;
        }

        h1 {
            color: #e63946;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: white;
            background-color: #e63946;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="mensagem">

        <?php if ($erro === ""): ?>

            <h1>Mensagem recebida!</h1>

            <p>
                Obrigado pelo contato,
                <?php echo htmlspecialchars($nome, ENT_QUOTES, "UTF-8"); ?>!
            </p>

            <p>Seus dados foram recebidos com sucesso.</p>

        <?php else: ?>

            <h1>Ops! Algo deu errado.</h1>

            <p>
                <?php echo htmlspecialchars($erro, ENT_QUOTES, "UTF-8"); ?>
            </p>

        <?php endif; ?>

        <a href="index.html#contato">Voltar ao site</a>

    </div>

</body>
</html>
