<?php
//inicia a sessão
session_start();

//Exibe "Olá, admin@localhost" para o usuario
echo "Olá, " . $_SESSION["login"];