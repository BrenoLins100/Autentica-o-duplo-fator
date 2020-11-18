<?php

// Classe Configurações de email, config. enviadas
// para testeEmail.php

class ConfigEmail {
    
    private $Email_Enviante = 'xxx@gmail.com';
    private $SenhaEmail_Enviante = 'senhaEmailEnviant';
    private $EnviadoPor = 'nao-responda@php2etapas.com';
    private $AssuntoEmail;
    private $CorpoEmail;
    private $Email_Destino;

    public function __construct($assunto, $texto) {
        $this->AssuntoEmail = $assunto;
        $this->CorpoEmail = $texto;
    }

    public function set_AssuntoEmail($assunto) 
    {
        $this->AssuntoEmail = $assunto;
    }

    public function set_CorpoEmail($texto) 
    {
        $this->CorpoEmail = $texto;
    }

    public function set_Email_Destino($email) 
    {
        $this->Email_Destino = $email;
    }

    public function get_EmailEnviante() 
    {
        return $this->Email_Enviante;
    }

    public function get_SenhaEmailEnviante() 
    {
        return $this->SenhaEmail_Enviante;
    }

    public function get_EnviadoPor() 
    {
        return $this->EnviadoPor;
    }

    public function get_AssuntoEmail() 
    {
        return $this->AssuntoEmail;
    }

    public function get_CorpoEmail() 
    {
        return $this->CorpoEmail;
    }

    public function get_EmailDestino() 
    {
        return $this->Email_Destino;
    }
}

?>
