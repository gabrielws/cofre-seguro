<?php

require_once 'controllers/verifica.php';
require_once 'db/config.php';

$title = "Dados Pessoais";
require_once 'modules/header.php';

$consulta = $con->query("SELECT dadospessoais.idDadoPessoal, dadospessoais.idUsuario, dadospessoais.idTipo, dadospessoais.nome, dadospessoais.conteudo, tipos.nome as 'nomeTipo' FROM dadospessoais INNER JOIN tipos ON dadospessoais.idTipo = tipos.idTipo where idUsuario =" . $_SESSION['user_id']);
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta2 = $con->query("SELECT * FROM tipos");
$tipos = $consulta2->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="content" class="p-4 p-md-5 pt-5">
  <div class="row row-cols-1 row-cols-md-3 g-4 text-white">

    <h1>Dados Pessoais</h1>

  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionar">
    Adicionar
  </button>

  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <!-- Modal -->
    <div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="adicionar" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Dado Pessoal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="controllers/add-dado.php" method="POST">
              <div class="form-group">
                <label for="nome" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="form-group">
                <label for="conteudo" class="col-form-label">Conteúdo:</label>
                <input type="text" class="form-control" id="conteudo" name="conteudo">
              </div>
              <div class="form-group">
                <label for="tipo" class="col-form-label">Tipo:</label>
                <select class="form-control" id="tipo" name="tipo">
                  <?php

                  foreach ($tipos as $tipo) {
                    echo '<option value="' . $tipo['nome'] . '">' . $tipo['nome'] . '</option>';
                  }

                  ?>
                </select>
              </div><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="select" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col-md-12">
      <div class="row">
        <?php foreach ($dados as $dado) : ?>
          <div class="col-xl-3 col-lg-6">
            <div class="card-page card l-bg-green-dark" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dado['idDadoPessoal'] ?>">
              <div class="card-statistic-3 p-2">
                <div class="card-icon card-icon-large"><i class="fas fa-id-badge"></i></div>
                <div class="mb-4">
                  <h5 class="card-title mb-0" style="font-weight: 500;"><?php echo mb_strimwidth($dado['nomeTipo'], 0, 25, '...') ?></h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                  <div class="col-8">
                    <h2 class="d-flex align-items-center mb-0" style="font-weight: 600;">
                      <?php echo $dado['nome'] ?>
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modal<?php echo $dado['idDadoPessoal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo $dado['nome'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="controllers/update-dado.php">
                    <input type="text" name="id" value="<?php echo $dado['idDadoPessoal'] ?>" hidden readonly>
                    <div class="form-group">
                      <label for="nome" class="col-form-label">Nome:</label>
                      <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $dado['nome'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="conteudo" class="col-form-label">Conteúdo:</label>
                      <input type="text" name="conteudo" class="form-control" id="conteudo" value="<?php echo $dado['conteudo'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="tipo" class="col-form-label">Tipo:</label>
                      <input type="text" class="form-control" value="<?php echo $dado['nomeTipo'] ?>" readonly disabled>
                    </div>
                    <br>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                  </form>
                  <div class="modal-footer">
                    <form action="controllers/delete-dado.php" method="POST">
                      <input type="text" name="id" value="<?php echo $dado['idDadoPessoal'] ?>" hidden readonly>
                      <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>


<?php require_once 'modules/footer.php'; ?>