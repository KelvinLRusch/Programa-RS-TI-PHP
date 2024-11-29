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
}