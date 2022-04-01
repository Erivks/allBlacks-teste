<?php

namespace Src\Controller;

class Torcedor {

    const REQUIRED_FIELDS = [
        "nome",
        "documento",
        "cep",
        "endereco",
        "bairro",
        "cidade",
        "uf",
        "ativo"
    ];

    private $torcedorModel;
    private $data;
    private $registro;

    public function __construct($data, $index) {
        $this->registro = $index;
        $this->data = $data["@attributes"];
        $this->torcedorModel = new \Src\Model\Torcedor($this->data);
    }

    public function validate(): Bool {
        $data = $this->data;
        foreach (self::REQUIRED_FIELDS as $fieldKey => $field) {
            if (!array_key_exists($field, $data)) {
                throw new \Exception("O campo $field não foi encontrado no registro: " . strval($this->registro + 1) . " no arquivo enviado.", 1);
            }
        }

        return true;
    }

    public function save(): Bool {
        $this->torcedorModel->save();
        return true;
    }


}