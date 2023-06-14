<?php

require_once 'controllers/verifica.php';
require_once 'db/config.php';

$title = "Dados Pessoais";
require_once 'modules/header.php';

$consulta = $con->query("SELECT * FROM dadospessoais INNER JOIN tipos ON dadospessoais.idTipo = tipos.idTipo where idUsuario =" . $_SESSION['user_id']);
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta2 = $con->query("SELECT * FROM tipos");
$tipos = $consulta2->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="content" class="p-4 p-md-5 pt-5">
  <div class="row row-cols-1 row-cols-md-3 g-4 text-white">

    <h1>Dados Pessoais</h1>

  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionar">
      Adicionar
    </button>

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
                    echo '<option value="' . $tipo['idTipo'] . '">' . $tipo['nome'] . '</option>';
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
    <?php foreach ($dados as $dado) : ?>
      <div class="col">
        <div class="card" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dado['idDadoPessoal'] ?>">
          <div class="card-body text-white">
            <div class="div-card">
              <h5 class="card-title"><?php echo $dado['nome'] ?></h5>
            </div>
            <p class="card-text text-muted"><?php echo $dado['conteudo'] ?></p>
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
              <form method="POST" action="controllers/update-credential.php">
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
                  <input type="text" class="form-control" value="<?php echo $dado['nome'] ?>" readonly disabled>
                </div>
                <br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <div class="modal-footer">
                <form action="controllers/delete-credential.php" method="POST">
                  <input type="text" name="id" value="<?php echo $senha['idSenha'] ?>" hidden readonly>
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

<?php require_once 'modules/footer.php'; ?>