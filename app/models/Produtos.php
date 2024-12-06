<?php
class Produtos {

    public $nome;
    public $cor;
    public $preco;
    public $descricao;
    public $fotos;
    public $categoria;
    

    public function getProdutos($idProduto = null) {
        //isset verifica se foi informado um id de produto
        //arrQueryParametros passa os parametros sendo vazios ou nao
        if(isset($idProduto)){
            $sqlQuery = "SELECT * FROM produtos p inner join produtos_has_categorias pc on p.id = pc.idProdutos WHERE id = ?";
            $arrQueryParametros = [$idProduto];
        }else{
            $sqlQuery = "SELECT * FROM produtos inner join produtos_has_categorias pc on p.id = pc.idProdutos";
            $arrQueryParametros = [];
        }
        try {
            return Database::query($sqlQuery, $arrQueryParametros);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    //função que pegava somente 1 produto diferente da anterior que pega 1 ou varios
    /*    public function getProduto($idProduto) {
        $sqlQuery = "SELECT * FROM produtos WHERE id = ?";

        try {
            return Database::query($sqlQuery, [$idProduto]);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }*/

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