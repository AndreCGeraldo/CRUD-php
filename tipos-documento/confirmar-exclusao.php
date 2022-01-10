<main>

    <h2 class="mt-3">Excluir Documento</h2>

    <form method="post">

        <div class="form-group">
            <p>Você deseja realmente excluir <strong><?= $obTipoDocumento->nome_doc ?></strong>?</p>
        </div>

        <div class="form-group">
            <button type="submit" name="excluir" class="btn btn-danger col-sm-2">Excluir</button>

            <a href="index.php">
                <button type="button" class="btn btn-success col-sm-2">Cancelar</button>
            </a>
        </div>

    </form>

</main>