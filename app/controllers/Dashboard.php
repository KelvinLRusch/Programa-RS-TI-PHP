<?php

require_once 'Login.php';

class Dashboard extends Controller {
    public function index() {
        // Instancia a Controller de Login (controllers/Login.php):
        $login = new Login();

        // Valida se o usuário está autenticado
        if($login->estaLogado()) {
            $this->view('dashboard/index')
        }else{
            $login->index();
        }
    }
}