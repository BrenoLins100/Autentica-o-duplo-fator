<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="spectre.min.css">
  <link rel="stylesheet" href="style_sucesso.css">
  <link rel="stylesheet" href="style.css">
  <title>Página de Sucesso!</title>
</head>
<body>

  <?php

    session_start();

    if (isset($_POST["btn_enviar_token"])) {

      // Código gerado para o email da pessoa na pág. anterior...
      $codigoGerado = $_SESSION['codigo_gerado_autimaticamente'];
      
      // Código digitado pela pessoa após o recebimen. do email na pág. anteior...
      $codigoDigitado = $_POST['codigo_pessoa'];

      // informações adicionais dessa pessoa...
      $nomeDigitado = $_SESSION['nome_pessoa'];
      $emailDigitado = $_SESSION['email_pessoa'];

      if ($codigoGerado === $codigoDigitado) 
      {
        echo 
          "<main id='sucesso_aviso'>
              <div>
                Bem vindo $nomeDigitado! Sua autenticação foi feita com sucesso. 😃
                <p id='link_voltar'><a href='index.php'>Voltar ao formulário de envio</a></p>
              </div>
          </main>";
      }
      else 
      {
        echo 
          "<main id='fracasso_aviso'>
              <div>
                <h4 id='erroTitulo'>
                  Erro de Cadastro
                </h4> 
                <h5>Código$codigoDigitado não bate com o token enviado ao email $emailDigitado</h5>
                <p id='link_voltar'><a href='index.php'>Voltar ao formulário de envio</a></p>
              </div>
          </main>
          ";
      }
    }

    else {
      $var = "<script>javascript:history.back(-2)</script>";
      echo $var;
    }

  ?>

</body>
</html>

