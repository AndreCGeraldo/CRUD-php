<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

if (isset($_POST['nome_doc'], $_POST['flag'], $_POST['cargo'])) {
  echo "<pre>";
  print_r($_POST);
  print_r($_FILES);
  echo "</pre>";
  die;

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';

?>

<main>

  <section>
    <a href="index.php">
      <button class="btn btn-primary col-sm-2">Voltar</button>
    </a>
  </section>

  <h2 class="mt-4">Anexar Documentos</h2>

  <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="colaborador_id" value="<?php echo $_GET['id'] ?>">


    <div class="row mt-3">
      <label>
        nome_doc
      </label>
      <input type="file" name="id" required>
    </div>

    <div class="row mt-3">
      <label>
        nome_doc
      </label>
      <input type="file" name="id" required>
    </div>

    <div class="row mt-3">
      <label>
        nome_doc
      </label>
      <input type="file" name="id" required>
    </div>

    <div class="form-group mt-3">
      <button type="submit" class="btn btn-success col-sm-2">Enviar</button>
    </div>

  </form>

</main>

<?php
include __DIR__ . '/includes/footer.php';
