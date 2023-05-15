<?php

class Pesquisa
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorNIS($nis)
    {
        $sql = "SELECT * FROM cidadaos WHERE nis = :nis";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class PesquisarCidadao
{
    private $pesquisa;

    public function __construct(Pesquisa $pesquisa)
    {
        $this->pesquisa = $pesquisa;
    }

    public function pesquisar($nis)
    {
        if (!is_numeric($nis)) {
            return "O NIS deve conter apenas números.";
        }

        $resultado = $this->pesquisa->buscarPorNIS($nis);

        if ($resultado) {
            return "Nome: " . $resultado['nome'] . "<br>" . "NIS: " . $resultado['nis'];
        } else {
            return "Cidadão não encontrado.";
        }
    }
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     $nis = $_GET['nis'];

//     $pesquisa = new Pesquisa($pdo);
//     $pesquisarCidadao = new PesquisarCidadao($pesquisa);
//     $resultado = $pesquisarCidadao->pesquisar($nis);

//     echo $resultado;
// }