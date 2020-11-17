<?php

    include_once ("recaptchalib.php");
    error_reporting(0);
    ini_set('display_errors', 0);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Recaptcha</title>

    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>

</head>
<body>

    <div class="container">
        <form method="POST" class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" required class="form-input">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha"  class="form-input" required>
            <br>
            <div class="g-recaptcha" data-sitekey="6LfkAOQZAAAAAAGUkp-sipYI_qog-v7M6aLuFK-o"></div>
            <button class="btn btn-primary" type="submit" >Entrar</button>
            </form>

              <?php 
            $secret = "6LfkAOQZAAAAAFaVSIsQidDSFdKBrl4kaVe-RcWa";
            $response = null;
            $reCaptcha = new reCaptcha($secret);

            if(isset($_POST['g-recaptcha-response'])){
                $response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'],$_POST['g-recaptcha-response']);
            }

            if($response != null && $response->success){
                echo "<div class='toast toast-success'>
                Acesso permitido
              </div>";
            }else{
                echo "<div class='toast toast-error'>
                Acesso negado, resolva a reCaptcha
              </div>";
            }
        ?>
      
    </div>

</body>
</html>