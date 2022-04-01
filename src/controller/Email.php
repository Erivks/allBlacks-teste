<?php

namespace Src\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email {

    private $data;
    private $torcedorModel;
    private $mail;
    private $fromEmail;
    private $password;
    private $fromName;

    public function __construct(Array $data) {
        $this->data = $data; 
        $this->torcedorModel = new \Src\Model\Torcedor();
        $this->mail = new PHPMailer(true);
        $this->fromEmail = "santos.dev08@gmail.com";
        $this->password = "22032000e";
        $this->fromName = "AllBlacks";
    }

    public function send() {
        $emails = $this->torcedorModel->getEmails();
        $mail = $this->mail;
        $mail->IsSMTP(); 
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.gmail.com"; // Servidor SMTP
        $mail->SMTPSecure = "tls"; // conexão segura com TLS
        $mail->Port = 587; 
        $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
        $mail->Username = $this->fromEmail; // SMTP username
        $mail->Password = $this->password; // SMTP password
        $mail->From = $this->fromEmail; // From
        $mail->FromName = $this->fromName; // Nome de quem envia o email
        $mail->WordWrap = 50; // Definir quebra de linha
        $mail->isHTML(true); //Set email format to HTML

        foreach ($emails as $key => $email) {
            $mail->Subject = $this->data["subject"]; // Assunto
            $mail->AddAddress($email["email"], $email["nome"]); // Email e nome de quem receberá
            $mail->Body = $this->data["bodyEmail"];
            $mail->send();
            \Src\Logger::add("Email enviado para " . $email["email"], __FILE__, "NOTICE");
        }
    }

    public function validate(): Void {
        if (
            (array_key_exists("subject", $this->data) && $this->data["subject"] == "") ||
            (array_key_exists("bodyEmail", $this->data) && $this->data["bodyEmail"] == "")
        ) {
            throw new \Exception("Por favor, preencha todos os campos para o envio de envio!", 1);
        }
    }
}