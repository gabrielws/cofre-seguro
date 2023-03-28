<?php
  require_once 'controllers/verifica.php';
  require_once 'db/config.php';

  $title = "Página Inicial";
  require_once 'modules/header.php'; 

  $consulta = $con->query("SELECT * FROM senhas where idUsuario = 2");
  $senhas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Page Content  -->

<div id="content" class="p-4 p-md-5 pt-5">

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="button">Adicionar</button>
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
      <form method="get" action="#">
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
      </div><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
  
</div>
</div>

<?php require_once 'modules/footer.php'; ?>