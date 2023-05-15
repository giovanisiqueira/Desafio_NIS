<?php

use PHPUnit\Framework\TestCase;

class CidadaoTest extends TestCase
{
    private $pdo;
    private $cadastro;

    protected function setUp(): void
    {
        // Configurar a conexão PDO com um banco de dados de teste (por exemplo, SQLite em memória)
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Criar a tabela de cidadaos de teste
        $this->pdo->exec('CREATE TABLE cidadaos (id INTEGER PRIMARY KEY, nome TEXT, nis TEXT)');

        // Instanciar a classe Cidadao
        $this->cadastro = new Cadastro($this->pdo);
    }

    public function testGenerateNIS()
    {
        // Inserir um registro de teste na tabela cidadaos
        $this->pdo->exec("INSERT INTO cidadaos (nome, nis) VALUES ('Teste', '10000000000')");

        // Gerar o NIS incremental
        $nis = $this->cadastro->generateNIS();

        // Verificar se o NIS gerado é o esperado (10000000000)
        $this->assertEquals('10000000000', $nis);
    }

    public function testCadastrarCidadao()
    {
        // Nome de teste
        $nome = 'Fulano de Tal';

        // Cadastrar o cidadão
        $nis = $this->cadastro->cadastrarCidadao($nome);

        // Verificar se o NIS gerado não está vazio
        $this->assertNotEmpty($nis);

        // Verificar se o registro foi inserido corretamente na tabela cidadaos
        $stmt = $this->pdo->query('SELECT * FROM cidadaos WHERE nome = :nome');
        $stmt->execute([':nome' => $nome]);
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals($nome, $registro['nome']);
        $this->assertEquals($nis, $registro['nis']);
    }

    public function testValidarNome()
    {
        // Nomes válidos
        $nomesValidos = [
            'Fulano de Tal',
            'João da Silva',
            'Maria José',
            'Álvaro Gómez'
        ];

        foreach ($nomesValidos as $nome) {
            $this->assertTrue(validarNome($nome));
        }

        // Nomes inválidos
        $nomesInvalidos = [
            '123',
            'Fulano123',
            'Fulano@',
            'Fulano!',
            'Fulano&*('
        ];

        foreach ($nomesInvalidos as $nome) {
            $this->assertFalse(validarNome($nome));
        }
    }
}