<?php
  require_once 'controllers/verifica.php';
  require_once 'db/config.php';

  $title = "Credenciais";
  require_once 'modules/header.php'; 

  $consulta = $con->query("SELECT * FROM senhas where idUsuario =".$_SESSION['user_id']);
  $senhas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="content" class="p-4 p-md-5 pt-5">
<div class="row row-cols-1 row-cols-md-3 g-4">

    <h1>Credenciais</h1>

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
          <h5 class="modal-title" id="exampleModalLabel">Adicionar Credencial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="controllers/add-credential.php" method="POST">
            <div class="form-group">
              <label for="nome" class="col-form-label">Nome:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="password" class="col-form-label">Senha:</label>
              <input type="text" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <label for="site" class="col-form-label">Site:</label>
              <input type="text" class="form-control" id="site" name="site">
            </div>
            <div class="form-group">
              <label for="url" class="col-form-label">URL:</label>
              <input type="text" class="form-control" id="url" name="url">
            </div><br>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach($senhas as $senha):?>
  <div class="col">
    <div class="card" data-bs-toggle="modal" data-bs-target="#modal<?php echo $senha['idSenha'] ?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $senha['nome'] ?></h5>
        <p class="card-text"><?php echo $senha['site'] ?></p>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal<?php echo $senha['idSenha'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $senha['nome'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="#">
          <div class="form-group">
            <label for="nome" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" value="<?php echo $senha['nome'] ?>">
          </div>
          <div class="form-group">
            <label for="senha" class="col-form-label">Senha:</label>
            <input type="text" class="form-control" id="senha" value="<?php echo $senha['senha'] ?>">
          </div>
          <div class="form-group">
            <label for="site" class="col-form-label">Site:</label>
            <input type="text" class="form-control" id="site" value="<?php echo $senha['site'] ?>">
          </div>
          <div class="form-group">
            <label for="url" class="col-form-label">URL:</label>
            <input type="text" class="form-control" id="url" value="<?php echo $senha['url'] ?>">
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