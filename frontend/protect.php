<?php

if (!isset($_SESSION)){
    session_start();

}

if (!isset($_SESSION['email'])) {
    die("Você não pode acessar essa página porque não está logado. <p> <a href=\"login.php\">Entrar</a></p>");
}


 



?>