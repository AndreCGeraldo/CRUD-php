<?php

$resultados = '';
foreach ($colaborador as $vaga) {
    $resultados .= '<tr>
                            <td>' . $vaga->id . '</td>
                            <td>' . $vaga->nome . '</td>
                            <td>' . $vaga->setor . '</td>
                            <td>' . $vaga->cargo . '</td>
                            <td>
                            <a href="anexar.php?id=' . $vaga->id . '">
                              <button type="button" class="btn btn-success p-2">Anexar Documentos</button>
                            </a>
                          </td>
                        </tr>';
}

?>
<main>

    <section>
        <a href="tipos-documento">
            <button class="btn btn-warning col-sm-2">Documentos</button>
        </a>
    </section>

    <section>

        <table class="table bg-light mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>

        </table>
    </section>

</main>