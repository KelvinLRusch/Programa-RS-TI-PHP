<?php
class Produto extends Controller {

    // Index da página (localhost/produto(/index))
    public function index($idProduto) {
        // Inicializa o modelo 'Produtos'
        $produtos = $this->model('Produtos');

        // Chama a função do modelo
        $produtoData = $produtos->getProdutos($idProduto)[0];
        // Converte a coluna "fotos" do DB de JSON para Array (vetor)
        $produtoData->fotos = json_decode($produtoData->fotos);
        
        $fmt = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
        // Calcula o valor de desconto à vista (3%)
        $produtoData->preco_desconto = $fmt->formatCurrency($produtoData->preco * (1-0.03), 'BRL');
        // Valor da parcela em 6x
        $produtoData->preco_parcelado = $fmt->formatCurrency($produtoData->preco/6, 'BRL');
        // Formata o preço com pontos e vírgulas, ex. "1728" vira "1.728,00"
        $produtoData->preco = $fmt->formatCurrency($produtoData->preco, 'BRL');
        
        $this->view('produto/index', ['produto' => $produtoData]);
    }

    public function addProduto(){
        //var_dump($_POST);

        //extrai e associa o valor a variaveis com o nome dos dados
        extract($_POST);

        //inicia o model Produtos
        $produto = $this->model('Produtos');

        //Executa a função da model
        $produto->nome = $nome;
        $produto->descricao = $descricao;
        $produto->preco = $preco;
        $produto->categoria = (int) $categoria; //(int) força que o valores do cadastro seja int
        $produto->cor = $cor;
        $resultado = $produto->insereProduto();
        echo $resultado;
    }
}