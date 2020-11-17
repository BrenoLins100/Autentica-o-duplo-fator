<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="spectre.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dupla autenticação</title>
</head>
<body>
    <?php 
        echo
            "<form class='formulario' action='token.php' method='POST'>

                <h2 id='titulo_form'>Insira seus dados para validação:</h2>
                
                <p id='aviso_p_validacao'>
                    Aviso para validação!
                </p>
                <p>
                    Após preencher seu campo de email, seremos capazes de enviar o código
                    de segurança a você, e por meio desse código você conseguirá acessar
                    a página de sucesso.
                </p>
                    
                <label class='form-label' for='email'>Insira seu email:</label>
                <input 
                    class='form-input' 
                    type='email' 
                    name='email' placeholder='ex: seuEmail.@outlook.com'
                    id='email' required>
                     
                <label class='form-label' for='email'>Insira seu nome completo:</label>
                <input 
                    class='form-input' 
                    type='text' 
                    name='nome_pessoa' placeholder='digite o seu nome.'
                    id='email' required>
                
                <button id='btn_enviar' name='btn_enviar' class='btn btn-primary' type='submit'>
                    Enviar código ao email
                </button>

            </form>";
        ?>
</body>
</html>