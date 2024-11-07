<?php

class Estados {

    public function getEstados() {
<<<<<<< HEAD
        $sqlQuery = "SELECT id,nome,uf FROM estado WHERE id <> 99";
=======
        $sqlQuery = "SELECT id,nome,uf FROM estado where id <> 99";
>>>>>>> ba92ce0 (teste)

        try {
            return Database::query($sqlQuery);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}