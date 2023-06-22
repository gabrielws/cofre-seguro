<?php


require_once 'controllers/verifica.php';
require_once 'db/config.php';

$title = "Credenciais";
require_once 'modules/header.php';

$consulta = $con->query("SELECT * FROM senhas where idUsuario =" . $_SESSION['user_id']);
$senhas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="content" class="p-4 p-md-5 pt-5" style="color: #fff;">
    <div class="row row-cols-1 row-cols-md-3 g-4 text-white">
        <h1>Sobre</h1>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos qui quam ea tempore neque modi fugit officia culpa atque! Quae officiis deleniti autem sapiente nisi libero sunt repellat suscipit nulla. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum ad saepe reprehenderit, nesciunt inventore iusto suscipit? Officia, excepturi laborum asperiores deleniti laboriosam itaque temporibus pariatur quidem, amet aspernatur atque modi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, in doloribus maiores ipsa maxime vel recusandae voluptate consectetur adipisci eius ipsum id ratione, obcaecati similique esse doloremque suscipit iste optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error porro obcaecati ducimus? Quaerat molestias id debitis dolores, fuga cupiditate consectetur? Maxime dolorem sint temporibus, aspernatur aut eos eaque recusandae provident. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi earum quae dignissimos sint debitis, deleniti et veniam tenetur fugit adipisci exercitationem aperiam sapiente consequatur repellendus! Ut incidunt soluta alias quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ullam dolorem, officiis nesciunt reiciendis libero itaque. Dolor ea quis distinctio iusto nobis, eius aspernatur soluta incidunt sit nihil amet. Ducimus.</p>
    <br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus optio reprehenderit aperiam nulla ab praesentium at vero voluptatibus maxime, quis vitae temporibus saepe dolores, modi, nostrum atque! Unde, iure provident? Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ipsum cum, reprehenderit quia aliquam molestiae soluta nostrum quod minima accusantium qui eius similique esse fugit. Fuga odio inventore aut id. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi culpa alias accusamus vero officia laudantium adipisci, laborum asperiores rem reprehenderit error inventore iste provident, eaque nulla? Ut corrupti ab consequatur.</p>
    <p style="text-align: center;">Desenvolvido por: <a target="_blank" href="https://www.linkedin.com/in/gabrieloliveiranr/">Gabriel</a></p>
</div>

<?php require_once 'modules/footer.php'; ?>