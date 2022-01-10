<?php
require '../vendor/autoload.php';

use \App\Entity\TipoDocumento;

$tipos = TipoDocumento::getTipos();

include '../includes/header.php';

?>

<main>
    <section>

        <a href="..\index.php">
            <button type="button" class="btn btn-warning col-sm-2 ">HOME</button>
        </a>

        <a href="inserir.php">
            <button type="button" class="btn btn-primary col-sm-2 ">Cadastrar</button>
        </a>

        <table class="table bg-light mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tipos as $tipo) {
                    echo '<tr>
                                            <td>' . $tipo->id . '</td>
                                            <td>' . $tipo->nome_doc . '</td>
                                            <td>'.date('d/m/Y à\s H:i:s',strtotime($tipo->data_criacao)).'</td>
                                            <td>
                                                <a href="editar.php?id=' . $tipo->id . '">
                                                    <button type="button" class="btn btn-success p-2">Editar</button>
                                                </a>
                                                <a href="excluir.php?id=' . $tipo->id . '">
                                                    <button type="button" class="btn btn-danger p-2">Excluir</button>
                                                </a>                                            
                                            </td>
                                        </tr>';
                }
                ?>
            </tbody>

        </table>
    </section>

</main>

<?php
include '../includes/footer.php';
