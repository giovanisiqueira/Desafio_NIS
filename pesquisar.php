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

  <h1>Pesquisar Cidadão</h1>
  <form method="get" action="controller/CidadaoController.php">
    <label for="nis">NIS:</label>
    <input type="text" id="nis" name="nis" required>
    <button type="submit">Pesquisar</button>
  </form>

  </body>
</html>