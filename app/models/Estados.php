<?php

class Estados {

    public function getEstados() {
        $sqlQuery = "SELECT id,nome,uf FROM estado where id <> 99";

        try {
            return Database::query($sqlQuery);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}