<?php
class Home extends Controller {

    // Index of the home page (localhost/home(/index))
    public function index($param1= '', $param2= '', $param3= '') {
        
        // Initialize Home model
        $pessoas = $this->model('Pessoas');
        
        // Call function from the model
        $pessoasData = $pessoas->getPessoa();
        
        $this->view('cadastro/index', ['pessoas' => $pessoasData, 'parameters' => [$param1, $param2, $param3]]);
    }
}

?>