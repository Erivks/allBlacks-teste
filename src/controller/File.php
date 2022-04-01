<?php

namespace Src\Controller;

class File {

    const PERMITTED_MIME_TYPES = [
        'text/xml'
    ];
    const MAXIMUM_SIZE = 50000;

    public function extractContent(String $filePath): \SimpleXMLElement {
        return simplexml_load_file($filePath);
    }

    public function validateMaxSize(Int $size): Bool {
        if ($size > self::MAXIMUM_SIZE) {
            throw new \Exception("O tamanho do arquivo passou dos limites!", 1);
        }

        return true;
    }

    public function validateMimeType(String $type): Bool {
        if (!in_array($type, self::PERMITTED_MIME_TYPES)) {
            throw new \Exception("O arquivo deve ser um XML!", 1);
        }

        return true;
    }

    public function saveLocally($path): Bool {

    }
}