<?php 
  require_once 'db/config.php';
  $title = "Página Inicial";
  require_once 'modules/header.php'; 

  $consulta = $con->query("SELECT * FROM senhas where idUsuario = 2");
  $senhas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Page Content  -->

<div id="content" class="p-4 p-md-5 pt-5">
<div class="row row-cols-1 row-cols-md-3 g-4">
 <p>Adicionar | Remover | Excluir</p>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">

<?php foreach($senhas as $senha):?>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $senha['nome'] ?></h5>
        <p class="card-text"><?php echo $senha['site'] ?></p>
      </div>
    </div>
  </div>  
<?php endforeach; ?>
  
  
</div>
</div>

<?php require_once 'modules/footer.php'; ?>