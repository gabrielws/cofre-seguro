<?php
//require_once 'controllers/verifica.php';
require_once 'db/config.php';
$title = "Entrar";
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
    <form action="controllers/signin.php" method="POST">
      <img class="mb-4" src="images/cofre.png" alt="" width="100">
      <h1 class="h3 mb-3 fw-normal">Entrar</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="email" placeholder="nome@exemplo.com" required minlength="3" maxlength="90">
        <label for="email">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="senha" placeholder="Senha" required minlength="3" maxlength="45">
        <label for="senha">Senha</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
      <p></p>
      <a href="/register.php"><button class="w-100 btn btn-lg btn-outline-secondary" type="button">Registrar</button></a>
      <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
  </main>



</body>

</html>