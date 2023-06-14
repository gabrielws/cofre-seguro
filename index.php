<?php
require_once 'controllers/verifica.php';
require_once 'db/config.php';
$title = "Página Inicial";
require_once 'modules/header.php';
?>

<div id="content" class="p-4 p-md-5 pt-5 text-white">

  <h1>Dashboard</h1>
  <P>Olá, <?php echo $_SESSION['user_name'] ?></P>

</div>

<?php require_once 'modules/footer.php'; ?>