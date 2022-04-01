<?php

namespace Src\Controller;

class Upload {
 
    private $post;
    private $files;

    public function __construct(Array $post, Array $files) {
        $this->post = $post;
        $this->files = $files;
        $this->file = new File();
    }

    /**
     * Valida o upload de arquivo, verificando tipo e tamanho do mesmo
     */
    public function validate(): Void {
        $post = $this->post;
        $files = $this->files;

        if (isset($post["submit"]) && isset($files["fileToUpload"])) {
            $this->file->validateMaxSize($files["fileToUpload"]["size"]);
            $this->file->validateMimeType($files["fileToUpload"]["type"]);
        } else {
            throw new \Exception("500 - Internal Server Error");
        }
    }

    public function save(): Void {
        $content = $this->file->extractContent($this->files["fileToUpload"]["tmp_name"]);
        $contentArray = (array)$content;

        if (isset($contentArray["torcedor"])) {
            foreach ($contentArray["torcedor"] as $torcedorKey => $torcedor) {
                $torcedorArray = (array)$torcedor;

                $torcedorController = new Torcedor($torcedorArray, $torcedorKey);
                $torcedorController->validate();
                $torcedorController->save();
            }
        } else {
            throw new \Exception("500 - Internal Server Error");
        }
    }
}