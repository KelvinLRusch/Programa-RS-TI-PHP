<?php

class Categorias {
    public $nome;

    public function getCategorias() {
        $sqlQuery = "SELECT id,nome FROM categorias";
        try {
            return Database::query($sqlQuery);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}