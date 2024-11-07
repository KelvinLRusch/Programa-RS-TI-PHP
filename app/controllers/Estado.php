<?php
<<<<<<< HEAD
class Estado extends Controller {
=======

Class Estado extends Controller {
>>>>>>> ba92ce0 (teste)
    public function getEstados() {
        $estados = $this->model("Estados");

        $estadosData = $estados->getEstados();

        return $estadosData;
    }
}