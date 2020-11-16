<?php

// iniciando armazenamento de sessão...

session_start();

require_once 'PHPMailer/PHPMailerAutoload.php';
require_once 'ConfigEmail.class.php';

if (isset($_POST["btn_enviar"])) {

    $email = $_POST['email'];
    $nome_pessoa = $_POST['nome_pessoa'];

    function generateID() {
        return uniqid();
    }

    $codigo = generateID();

    // Armazenando o código gerado em uma sessão...

    $_SESSION['codigo_gerado_autimaticamente'] = $codigo;

    // Amazenando demais informações menos importantes numa sessão...

    $_SESSION['nome_pessoa'] = $nome_pessoa;
    $_SESSION['email_pessoa'] = $email;

    // Inicializando Objetos necessários para meu robozinho de email...

    $config = new ConfigEmail(
        "Robô de Emails - Seguranças em Sistemas p/ Internet",
        "Olá <strong>$nome_pessoa</strong>, 
        <br>
        Você recebeu a mensagem de validação, 
        aqui está seu código de segurança: <strong>$codigo</strong>"
    );

    $config->set_Email_Destino($email);

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = $config->get_EmailEnviante();
    $mail->Password = $config->get_SenhaEmailEnviante();
    $mail->SetFrom($config->get_EnviadoPor());
    $mail->Subject = $config->get_AssuntoEmail();
    $mail->Body = $config->get_CorpoEmail();
    $mail->AddAddress($config->get_EmailDestino());

    $mail->Send();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="spectre.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Confirmação de Código</title>
</head>
<body>

    <?php 
        if (isset($_POST["btn_enviar"])) {

            echo "<form class='formulario' action='sucesso.php' method='POST'>

                <h2 id='titulo_form'>Insira seu código de acesso:</h2>

                <p>
                    <strong>$nome_pessoa</strong>, seu código de acesso foi enviado 
                        para o email: <strong>$email</strong>
                </p>

                <label class='form-label' for='codigo_pessoa'>Insira o código (token):</label>
                <input 
                    class='form-input' 
                    type='password' 
                    name='codigo_pessoa' placeholder='ex: 479AdleYk12'
                    id='codigo_pessoa' required>

                <button type='submit' id='btn_enviar_token' name='btn_enviar_token' class='btn btn-primary'>
                    Autenticar código ✔️
                </button>

            </form>";

        }

        else {
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        }
    ?>

</body>
</html>
