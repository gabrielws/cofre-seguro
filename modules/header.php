<!doctype html>
<html lang="pt-br">

<head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <script src="https://kit.fontawesome.com/cbf4443dca.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Menu</span>
                </button>
            </div>

            <h1><a href="/" class="logo">Cofre Seguro</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active"><a href="/"><span class="fa fa-home mr-3"></span> Dasboard</a></li>
                <li><a href="/credentials.php"><span class="fa fa-user mr-3"></span> Credenciais</a></li>
                <li><a href="/dados_pessoais.php"><span class="fa fa-address-card mr-3"></span> Dados Pessoais</a></li>
                <li><a href="/notas_seguras.php"><span class="fa fa-sticky-note mr-3"></span> Notas Seguras</a></li>
                <li><a href="/minha_conta.php"><span class="fa fa fa-cog mr-3"></span> Minha Conta</a></li>
                <li><a href="/sobre.php"><span class="fa fa-info-circle mr-3"></span> Sobre</a></li>

                <li><a href="controllers/logout.php" class="btn-logout"><span class="fa fa-window-close mr-3 "></span> Sair</a></li>
            </ul>

        </nav>