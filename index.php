<?php

require_once dirname(__FILE__)."/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$viewer = new \Src\Viewer();

try {
    if (array_key_exists("action", $_GET)) {
        \Src\Logger::add("action preenchido", __FILE__, "NOTICE");
        $router = new \Src\Router($_GET["action"]);
        $action = $router->getCalledRoute();
        \Src\Logger::add("action $action executando..", __FILE__, "NOTICE");

        switch ($action) {
            case 'upload':
                $upload = new \Src\Controller\Upload($_POST, $_FILES);
                $upload->validate();
                $upload->save();
                $viewer->showTemplate("index", [
                    "{{SUCCESS}}" => "Arquivo enviado com sucesso!",
                    "hidden-success" => "",
                    "hidden-error" => "hidden"
                ]);
                break;
            case 'sendEmail':
                if (isset($_POST)) {
                    $email = new \Src\Controller\Email($_POST);
                    $email->validate();
                    $email->send();
                    $viewer->showTemplate("index", [
                        "{{SUCCESS}}" => "Email enviado com sucesso!",
                        "hidden-success" => "",
                        "hidden-error" => "hidden"
                    ]);
                }
                break;
        }
    } else {
        //showTemplate sem paramêtro retorna template index: index.tpl.html 
        $viewer->showTemplate("index", [
            "hidden-success" => "hidden",
            "hidden-error" => "hidden"
        ]);
    }

} catch (Exception $e) {
    $msg = $e->getMessage();
    if ($e->getCode() === 0) {
        $viewer->showTemplate("error", [
            "{{ERROR}}" => $msg
        ]);
    } else {
        $viewer->showTemplate("index", [
            "{{ERROR}}" => $msg,
            "hidden-error" => "",
            "hidden-success" => "hidden"
        ]);
    }

}