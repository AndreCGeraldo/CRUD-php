<?php
require '../vendor/autoload.php';

use \App\Entity\TipoDocumento;

include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipoDocumento = new TipoDocumento;
    $tipoDocumento->nome_doc = $_POST['nome_doc'];
    $tipoDocumento->flag = $_POST['flag'] ?? 0;
    $tipoDocumento->data_criacao = date('Y-m-d H:i:s');
    $tipoDocumento->data_modificado = date('Y-m-d H:i:s');
    $tipoDocumento->id_criador = 1;
    $tipoDocumento->id_modificador = 1;

    $sucesso = $tipoDocumento->cadastrar();

    echo ($sucesso) ?
        "<script>window.alert('Cadastrado com sucesso.')</script>" :
        "<script>window.alert('Ops, falhou no cadastro.')</script>";

    echo "<script>window.location='index.php'</script>";
}

?>

<section>
    <a href="index.php">
        <button class="btn btn-primary col-sm-2">Voltar</button>
    </a>
</section>


<h2 class="mt-2">Cadastrar Documentos</h2>

<main>
    <section>

        <form action="" method="POST">

            <div class="form-group mt-3">
                <label for="nome_doc">Nome do Documento</label>
                <input type="text" class="form-control" name="nome_doc" placeholder="Insira o nome" value="">
            </div>

            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="flag" value="1">
                    <label for="flag">Obrigatoriedade</label>
                </label>
            </div>

            <button type="submit" class="btn btn-success col-sm-2">Cadastrar</button>

        </form>

    </section>

</main>

<?php
include '../includes/footer.php';
