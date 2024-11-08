<?php

class Pessoas {
    public $cpf;
    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;
    public $data_nascimento;
    public $cep;
    public $rua;
    public $numero;
    public $bairro;
    public $complemento;
    public $estado;
    public $cidade;
    public $sexo;

    // Obtém uma pessoa específica ou todas as pessoas
    // do banco de dados.
    public function getPessoa($sqlParameters = 1) {
        $sqlQuery = "SELECT * FROM pessoas";
            
        try {
            return Database::query($sqlQuery);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    // Adiciona uma pessoa ao banco de dados.
    public function inserirPessoa() {
        $sqlQuery = "INSERT INTO `pessoas`\
        (`cpf`,\
        `nome`,\
        `sobrenome`,\
        `data_nascimento`,\
        `sexo`,\
        `telefone`,\
        `email`,\
        `cep`,\
        `numero`,\
        `bairro`,\
        `cidade`),\
        `rua`),\
        `estado`),\
        `complemento`),\
        VALUES\
        ('?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?',\
        '?');";
        try{
            return Database::query($sqlQuery,
        [$this->cpf,
                $this->nome,
                $this->sobrenome,
                $this->data_nascimento,
                $this->sexo,
                $this->telefone,
                $this->email,
                $this->cep,
                $this->numero,
                $this->bairro,
                $this->cidade,
                $this->rua,
                $this->estado,
                $this->complemento]
            );
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    // Exclui uma pessoa do banco de dados.
    public function excluirPessoa() {
        return true;
    }

    // Atualiza o cadastro de uma pessoa no banco de dados.
    public function editarPessoa() {
        return true;
    }

    
}

?>