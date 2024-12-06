<?php

require_once 'Login.php';

class Dashboard extends Controller {
    private $login;

    public function __construct() {
        // Instancia a Controller de Login (controllers/Login.php):
        $this->login = new Login();
    }

    public function index() {
        // Valida se o usuário está autenticado
        if($this->login->estaLogado()) {
            $this->view('dashboard/index');
        } else{
            $this->login->index();
        }
    }
    
    public function cadastrarProduto() {
        if($this->login->estaLogado()) {
            $categorias = $this->model('Categorias');
            $categoriaData = $categorias->getCategorias();
            $this->view("dashboard/cadastrarProduto",['categorias' => $categoriaData]);
        } else{
            $this->login->index();
        }
    }

    public function editarProduto($idProduto) {
        if($this->login->estaLogado()) {
            //esta logado
            //carrega a model Categorias
            $categorias = $this->model('Categorias');
            //chama a funçao getCategorias da model
            $categoriasData = $categorias->getCategorias();

            //Carrega a model Produtos
            $produtos = $this->model('Produtos');
            //chama a funçao para pegar os dados do produto 
            $produtosData = $produtos->getProdutos($idProduto);

            //chama a view passando as categorias armazenadas em $categoriasData
            $this->view('dashboard/cadastrarProduto',['categorias'=> $categoriasData,
                                                                  'produtos'=> $produtosData[0]]);
        } else {
            //se nao esta logado exibe tela de login
            $this->login->index();
        }
    }

    public function listarProdutos() {
        if($this->login->estaLogado()) {
            //Carrega a model Produtos
            $produtos = $this->model('Produtos');
            //chama a funçao para pegar os dados do produto 
            $produtosData = $produtos->getProdutos();

            //chama a view passando as categorias armazenadas em $categoriasData
            $this->view('dashboard/listarProdutos',['produtos'=> $produtosData]);
        } else {
            //se nao esta logado exibe tela de login
            $this->login->index();
        }
    }
}