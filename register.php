<?php
//require_once 'controllers/verifica.php';
require_once 'db/config.php';
$title = "Registrar";
?>

<!doctype html>
<html lang="pt-br">

<head>
  <title><?php echo $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="css/signin.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body class="text-center">

  <main class="form-signin">
    <form action="controllers/register.php" method="POST">
      <img class="mb-4" src="images/cofre.png" alt="" width="100">
      <h1 class="h3 mb-3 fw-normal">Registrar</h1>

      <div class="form-floating">
        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required minlength="3" maxlength="24">
        <label for="nome">Nome</label>
      </div>
      <div class="form-floating">
        <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="Sobrenome" required minlength="3" maxlength="24">
        <label for="sobrenome">Sobrenome</label>
      </div>
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required minlength="3" maxlength="90">
        <label for="email">Email</label>
      </div>
      <div class="form-floating">
        <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="(12)3 4567-8910" required minlength="3" maxlength="16">
        <label for="telefone">Telefone</label>
      </div>
      <div class="form-floating">
        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required minlength="3" maxlength="45">
        <label for="senha">Senha</label>
      </div><br>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button></p>
      <a href="/signin.php"><button class="w-100 btn btn-lg btn-outline-secondary" type="button">Voltar e fazer login</button></a>
      <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
  </main>



</body>

</html>