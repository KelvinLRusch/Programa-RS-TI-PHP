<?php
class Produto extends Controller {

    // Index da página (localhost/produto(/index))
    public function index($idProduto) {
        $this->view('produto/index', ['produto' => $this->listaProdutos($idProduto)]);
    }

    public function listaProdutos($idProduto = null) {
        // Inicializa o modelo 'Produtos'
        $produtos = $this->model('Produtos');

        // Chama a função do modelo
        $produtosData = $produtos->getProdutos($idProduto);
        for ($i = 0; $i < count($produtosData); $i++) {
            // Converte a coluna "fotos" do DB de JSON para Array (vetor)
            $produtosData[$i]->fotos = json_decode($produtosData[$i]->fotos);
            
            $fmt = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
            // Calcula o valor de desconto à vista (3%)
            $produtosData[$i]->preco_desconto = $fmt->formatCurrency($produtosData[$i]->preco * (1-0.03), 'BRL');
            // Valor da parcela em 6x
            $produtosData[$i]->preco_parcelado = $fmt->formatCurrency($produtosData[$i]->preco/6, 'BRL');
            // Formata o preço com pontos e vírgulas, ex. "1728" vira "1.728,00"
            $produtosData[$i]->preco = $fmt->formatCurrency($produtosData[$i]->preco, 'BRL');
        }

        return $produtosData;
    }

    public function addProduto() {
        // Imprime as variáveis recebidas pelo formulário
        // de Cadastro de Produtos na tela
        // var_dump($_POST);

        // Extrai e associa os valores do formulário a variáveis
        // Por exemplo, $_POST['nome'] vira $nome
        // Equivalente a: $nome = $_POST['nome'];
        extract($_POST);

        // Inicializa o modelo 'Produtos'
        $produtoDB = $this->model('Produtos');

        // Executa a função do modelo
        $produtoDB->nome = $nome;
        $produtoDB->categoria = (int) $categoria;
        $produtoDB->cor = $cor;
        $produtoDB->preco = $preco;
        $produtoDB->descricao = $descricao;
        $resultado = $produtoDB->addProduto();

        echo $resultado;
    }
}