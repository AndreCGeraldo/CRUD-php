<?php
require '../vendor/autoload.php';

use \App\Entity\TipoDocumento;

include '../includes/header.php';

define('TITLE', 'Editar Documento');


//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//CONSULTA A TIPO
$obTipoDocumento = TipoDocumento::getTipoDocumento($_GET['id']);

//VALIDAÇÃO DA TIPO
if (!$obTipoDocumento instanceof TipoDocumento) {
    header('location: index.php?status=error');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipoDocumento = new TipoDocumento;
    $tipoDocumento->id = $_POST['id'];
    $tipoDocumento->nome_doc = $_POST['nome_doc'];
    $tipoDocumento->flag = $_POST['flag'] ?? 0;
    $tipoDocumento->data_criacao = date('Y-m-d H:i:s');
    $tipoDocumento->data_modificado = date('Y-m-d H:i:s');
    $tipoDocumento->id_criador = 1;
    $tipoDocumento->id_modificador = 1;

    $sucesso = $tipoDocumento->atualizar();

    echo ($sucesso) ?
        "<script>window.alert('Alteração feita com sucesso.')</script>" :
        "<script>window.alert('Ops, falha na Alteração.')</script>";

    echo "<script>window.location='index.php'</script>";
}

?>

<section>
    <a href="index.php">
        <button class="btn btn-primary col-sm-2">Voltar</button>
    </a>
</section>

<h2 class="mt-2">Editar Documentos</h2>

<main>
    <section>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $obTipoDocumento->id ?>">

            <div class="form-group mt-3">
                <label for="nome_doc">Nome do Documento</label>
                <input type="text" class="form-control" name="nome_doc" placeholder="Insira o nome" value="<?= $obTipoDocumento->nome_doc ?>">
            </div>

            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="flag" value="1" <?= $obTipoDocumento->flag == '1' ? 'checked' : '' ?>>
                    <label for="flag">Obrigatoriedade</label>
                </label>
            </div>

            <button type="submit" class="btn btn-success col-sm-2">Enviar</button>

        </form>

    </section>

</main>

<?php
include '../includes/footer.php';
