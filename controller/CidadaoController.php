<?php

require_once '../config/config.php';
include '../model/cadastro.php';
include '../model/pesquisa.php';


class CidadaoController
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function cadastro ($request) {

        try {
            $nome = $request['nome'];

            $cidadao = new Cadastro($this->pdo);

            if (!validarNome($nome)) {
                throw new Exception("Nome inválido. O nome deve conter apenas letras, espaços e acentos.", 1);
            }

            $nis = $cidadao->cadastrarCidadao($nome);

            include '../view/cadastro.phtml';


        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }

    }

    function pesquisa ($request) {

        try {
        $nis = $request['nis'];

        $pesquisa = new Pesquisa($this->pdo);
        $pesquisarCidadao = new PesquisarCidadao($pesquisa);
        $resultado = $pesquisarCidadao->pesquisar($nis);
    
        include '../view/pesquisa.phtml';
        

        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}

$cidadaoController = new CidadaoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$cidadaoController->cadastro($_POST);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cidadaoController->pesquisa($_GET);

}
