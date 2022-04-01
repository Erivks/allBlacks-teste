<?php

namespace Src\Model;

class Torcedor {

    private $data;
    private $nome;
    private $documento;
    private $cep;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;
    private $telefone;
    private $email;
    private $ativo;
    private $db;

    public function __construct(Array $data = []) {
        if (!empty($data)) {
            $this->data         = $data;
            $this->nome         = $data["nome"];
            $this->documento    = $data["documento"];
            $this->cep          = $data["cep"];
            $this->endereco     = $data["endereco"];
            $this->bairro       = $data["bairro"];
            $this->cidade       = $data["cidade"];
            $this->uf           = $data["uf"];
            $this->telefone     = $data["telefone"] ?? null;
            $this->email        = $data["email"]    ?? null;
            $this->ativo        = $data["ativo"] == "1" ? "SIM" : "NÃO";
        }

        $this->db           = new \Src\Database\DB();
    }

    public function save() {
        try {
            $conn = $this->db->getConn();
            $statement = $conn->prepare(
                "INSERT INTO torcedores (nome, documento, cep, endereco, bairro, cidade, uf, telefone, email, ativo) 
                VALUES (:nome, :documento, :cep, :endereco, :bairro, :cidade, :uf, :telefone, :email, :ativo)"
            );
    
            $statement->execute($this->data);
        } catch (\PDOException $e) {
            throw new \Exception("Erro ao inserir registro no banco, por favor, tente novamente mais tarde!", 1);
        }

    }

    public function getEmails(): Array {
        try {
            $conn = $this->db->getConn();
            $statement = $conn->query("SELECT email, nome FROM torcedores");
            
            $result = $statement->fetchAll();
            if (!$result) {
                throw new \Exception("Não existem emails cadastrados!", 1);
            }

            return $result;
        } catch (\PDOException $e) {
            \Src\Logger::add($e->getMessage(), __METHOD__, "ERROR");
            throw new \Exception("Erro ao obter emails cadastrados", 1);
        }


    }
}