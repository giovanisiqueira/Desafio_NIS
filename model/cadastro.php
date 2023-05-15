<?php

class Cadastro
{
    private $pdo;
    private $nisMax = 11;
    private $nisInicial = '10000000000';

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function generateNIS()
    {
        $lastNIS = $this->getLastNIS();

        if ($lastNIS) {
            $lastNIS = intval($lastNIS);
            $nis = str_pad($lastNIS + 1, $this->nisMax, '0', STR_PAD_LEFT);
        } else {
            $nis = $this->nisInicial;
        }

        return $nis;
    }

    private function getLastNIS()
    {
        $stmt = $this->pdo->query('SELECT nis FROM cidadaos ORDER BY id DESC LIMIT 1');
        return $stmt->fetchColumn();
    }

    public function cadastrarCidadao($nome)
    {
        $nis = $this->generateNIS();

        $this->inserirRegistro($nome, $nis);

        return $nis;
    }

    private function inserirRegistro($nome, $nis)
    {
        $stmt = $this->pdo->prepare('INSERT INTO cidadaos (nome, nis) VALUES (:nome, :nis)');
        $stmt->execute([':nome' => $nome, ':nis' => $nis]);
    }
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nome = $_POST['nome'];

//     $cidadao = new Cadastro($pdo);

//     if (!validarNome($nome)) {
//         echo 'Nome inválido. O nome deve conter apenas letras, espaços e acentos.';
//         exit;
//     }

//     $nis = $cidadao->cadastrarCidadao($nome);

//     echo 'Cidadão cadastrado com sucesso. Número NIS: ' . $nis . '<br>';
//     echo '<a href="pesquisar.php">Pesquisar</a>';
// }

function validarNome($nome)
{
    return preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $nome);
}

?>