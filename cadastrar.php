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

    <title>Cadastro</title>
  </head>
  <body>

  <h1>Cadastro de Cidadãos</h1>
  <form method="post" action="controller/CidadaoController.php">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <button type="submit">Cadastrar</button>
  </form>

  </body>
</html>