<?php

require_once 'controllers/verifica.php';
require_once 'db/config.php';

$title = "Minha Conta";
require_once 'modules/header.php';

$idUsuario = $_SESSION['user_id'];

try {
    $select = $con->prepare("SELECT * FROM usuarios WHERE idUsuario = :idUsuario");
    $select->bindParam(':idUsuario', $idUsuario);
    $select->execute();
    $dados = $select->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Alterar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/update-senha.php" method="post">

                    <div class="mb-3">
                        <label for="senhaAtual" class="form-label">Senha Atual</label>
                        <input type="password" class="form-control" id="senhaAtual" name="senhaAtual">
                    </div>

                    <div class="mb-3">
                        <label for="novaSenha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="novaSenha" name="novaSenha">
                    </div>

                    <div class="mb-3">
                        <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 text-white">

        <h1>Dados Pessoais</h1>

    </div>

    <div class="row">
        <!-- <div class="col-xl-4">
            <div class="mb-4 mb-xl-0">
                <div class="card-header">Imagem de Perfil</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <div class="small font-italic text-muted mb-4">JPG ou PNG menor que 5 MB</div>
                    <button class="btn btn-primary" type="button">Enviar Imagem</button>
                </div>
            </div>
        </div> -->
        <div class="col-xl-12">
            <div class="mb-4" style="color: #fff;"><br>
                <div class="card-header">Detalhes da Conta</div>
                <div class="card-body">
                    <form method="post" action="controllers/update-user.php">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="nome">Nome</label>
                                <input class="form-control" name="nome" id="nome" type="text" placeholder="Escreva seu nome" value="<?php echo $dados['nome'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="sobrenome">Sobrenome</label>
                                <input class="form-control" name="sobrenome" id="sobrenome" type="text" placeholder="Escreva seu sobrenome" value="<?php echo $dados['sobrenome'] ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control" name="email" id="email" type="email" placeholder="Escreva seu email" value="<?php echo $dados['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="telefone">Telefone</label>
                            <input class="form-control" name="telefone" id="telefone" type="tel" placeholder="Escreva seu telefone" value="<?php echo $dados['telefone'] ?>">
                        </div><br>
                        <button class="btn btn-primary" type="submit">Salvar Alterações</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Alterar Senha
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php require_once 'modules/footer.php'; ?>