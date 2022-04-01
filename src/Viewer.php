<?php

namespace Src;

class Viewer {

    private $templateDir;

    public function __construct() {
        $this->templateDir = dirname(__FILE__)."/templates/view/";
    }

    public function showTemplate($view = "index", $dataReplace = []) {
        $content = $this->getTemplate($view);

        if (!empty($dataReplace)) {
            foreach ($dataReplace as $dataKey => $dataValue) {
                $content = str_replace($dataKey, $dataValue, $content);
            }
        }

        \Src\Logger::add("chamando template '$view' com as informações: " . json_encode($dataReplace), __FILE__, "NOTICE");

        echo $content;
    }

    private function getTemplate(String $template) {
        //Verifica se arquivo existe dentro do diretório
        //src/templates/view/
        $file = $this->templateDir.$template.".tpl.html";
        if (file_exists($file) && is_writable($file)) {
            $contents = file_get_contents($file);
            return $contents;
        }

        throw new \Exception("500 - Internal Server Error");
    }


}