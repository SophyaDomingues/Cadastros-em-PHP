<?php
session_start();
include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';
?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Resgistros</h5><hr>
    </div>
</div>

<?php
    include_once 'banco-de-dados/conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id'] = $id;
    $querySelect  = $link->query("SELECT * FROM tb_clientes WHERE id=$id");

    while($registros = $querySelect->fetch_assoc()):
        $nome = $registros['nome'];
        $email = $registros['email'];
        $telefone = $registros['telefone'];
    endwhile;
?>

<div class="row container">
        <p>&nbsp;</p>
        <form action="banco-de-dados/update.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend>Cadastro</legend>
                <h5 class="light center">Alteração</h5>

                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                    <label for="nome">Nome do cliente</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="text" name="email" id="email" value="<?php echo $email ?>" maxlength="60" required >
                    <label for="email">E-mail cliente</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="15" required>
                    <label for="telefone">Telefone cliente</label>
                </div>

                <div class="input-field col s12">
                    <input type="submit" value="Alterar" class="btn green">
                    <a href="consultas.php" class="btn red">Cancelar</a>
                </div>
            </fieldset>
        </form>
    </div>

<?php include_once 'include/footer.inc.php' ?>