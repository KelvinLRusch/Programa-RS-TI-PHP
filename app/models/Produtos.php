<?php
class Produtos {

    public $nome;
    public $cor;
    public $preco;
    public $descricao;
    public $fotos;
    public $categoria;
    

    public function getProduto($idProduto) {
        $sqlQuery = "SELECT * FROM produtos WHERE id = ?";

        try {
            return Database::query($sqlQuery, [$idProduto]);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insereProduto(){
        // \ quebra a linha na query
        $sqlQuery = "INSERT INTO `produtos`
                        (`nome`, `cor`, `preco`, `descricao`, `fotos`)
                        VALUES
                        (?, ?, ?, ?, ?);";
        try {
            $idProdutoAdicionado = Database::query($sqlQuery,
                                                [$this->nome,
                                                        $this->cor,
                                                        $this->preco,
                                                        $this->descricao,
                                                        $this->fotos ?? '']); //adiciona fotos ou nada se nao forem carregados arquivos
            if($idProdutoAdicionado){
                $sqlQuery = "INSERT INTO `produtos_has_categorias`
                            (`idProdutos`, `idCategorias`)
                            VALUES
                            (?, ?);";
                try {
                    Database::query($sqlQuery,
                                    [$idProdutoAdicionado,
                                            $this->categoria]);
                    return $idProdutoAdicionado;
                } catch (\PDOException $e) {
                    exit($e->getMessage());
                }
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}