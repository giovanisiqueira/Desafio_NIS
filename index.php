<!DOCTYPE html>
<html lang="pt-BR">

  <!-- Inclui o arquivo de menu -->
  <?php include 'menu.php'; ?>

  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Desafio NIS</title>
  </head>
  <body>

  <h1>Cenário</h1>
  <p>O NIS (Número de Identificação Social) é um identificador único atribuído pela Caixa Econômica Federal aos cidadãos. Composto por 11 dígitos, é utilizado para realizar o pagamento de benefícios sociais, assim como chave de identificação nas Políticas Públicas, emissão de documentos, dentre outras utilidades.</p>

  <h1>Desafio</h1>
  <p>Crie uma aplicação contendo um formulário para cadastrar cidadãos. O formulário deve conter um único campo para informar o nome do cidadão. Ao ser cadastrado, um número NIS deve ser gerado automaticamente, atribuído a esta pessoa e então exibido na tela junto de uma mensagem de sucesso.</p>
  <p>Deve ser possível também pesquisar os registros já existentes através do número NIS. Caso o NIS informado já esteja cadastrado, a aplicação deve exibir o nome do cidadão e seu número NIS. Caso não esteja, deve exibir: “Cidadão não encontrado”.</p>
  <p>Lembre-se de criar um README contendo as instruções necessárias para executarmos a aplicação.</p>

  <h1>Regras</h1>
  <ul>
    <li>O backend da aplicação deve ser escrito em PHP;</li>
    <li>O código deve ser escrito com o paradigma da Programação Orientada a Objetos;</li>
    <li>Não é permitido usar nenhum framework para criação de aplicações inteiras como Symfony ou Laravel. Mas você pode usar "frameworks" para tarefas específicas, como o PHPUnit para testes por exemplo.</li>
    <li>Você pode usar qualquer outra biblioteca de terceiros que desejar.</li>
  </ul>

  <h1>O que será avaliado</h1>
  <ul>
    <li>O funcionamento correto da aplicação de acordo com os requisitos do desafio;</li>
    <li>A arquitetura da aplicação;</li>
    <li>A qualidade, clareza e organização do código entregue. Iremos ler cada linha de código, então capriche!</li>
    <li>A utilização de boas práticas de desenvolvimento.</li>
  </ul>

  <h1>Bônus</h1>
  <ul>
    <li>Utilização de padrões arquiteturais e de projeto;</li>
    <li>Testes automatizados;</li>
    <li>A utilização de um gerenciador de pacotes.</li>
  </ul>

  </body>
</html>