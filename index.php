<?php
require_once 'controllers/verifica.php';
require_once 'db/config.php';
$title = "Página Inicial";
require_once 'modules/header.php';

$consulta = $con->query("SELECT COUNT(idSenha) FROM senhas where idUsuario =" . $_SESSION['user_id']);
$senhas = $consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta = $con->query("SELECT COUNT(idDadoPessoal) FROM dadospessoais where idUsuario =" . $_SESSION['user_id']);
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta = $con->query("SELECT COUNT(idNota) FROM notas where idUsuario =" . $_SESSION['user_id']);
$notas = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="content" class="p-4 p-md-5 pt-5 text-white">

  <h1>Dashboard</h1>
  <!-- <P>Olá, <?php echo $_SESSION['user_name'] ?></P> -->

  <br><br>

  <div class="col-md-10 ">
    <div class="row ">

      <div class="col-xl-3 col-lg-6">
        <a href="/credentials.php">
          <div class="card-index card l-bg-blue-dark">
            <div class="card-statistic-3 p-2">
              <div class="card-icon card-icon-large"><i class="fas fa-key"></i></div>
              <div class="mb-4">
                <h5 class="card-title mb-0">Credenciais</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0">
                    <?php echo $senhas[0]['COUNT(idSenha)']; ?>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-3 col-lg-6">
        <a href="/dados_pessoais.php">
          <div class="card-index card l-bg-green-dark">
            <div class="card-statistic-3 p-2">
              <div class="card-icon card-icon-large"><i class="fas fa-id-badge"></i></div>
              <div class="mb-4">
                <h5 class="card-title mb-0">Dados Pessoais</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0">
                    <?php echo $dados[0]['COUNT(idDadoPessoal)']; ?>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6">
        <a href="/notas_seguras.php">
          <div class="card-index card l-bg-orange-dark">
            <div class="card-statistic-3 p-2">
              <div class="card-icon card-icon-large"><i class="fas fa-note-sticky"></i></div>
              <div class="mb-4">
                <h5 class="card-title mb-0">Notas Seguras</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0">
                    <?php echo $notas[0]['COUNT(idNota)']; ?>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- <div class="col-xl-3 col-lg-6">
        <div class="card-index card l-bg-cherry">
          <div class="card-statistic-3 p-2">
            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
            <div class="mb-4">
              <h5 class="card-title mb-0">Outro</h5>
            </div>
            <div class="row align-items-center mb-2 d-flex">
              <div class="col-8">
                <h2 class="d-flex align-items-center mb-0">
                  3,243
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>

</div>

<?php require_once 'modules/footer.php'; ?>