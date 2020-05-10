<?php

use yii\helpers\Url;

$this->title = "Listado Clubes de Futbol";
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="text-center mb-4"> Listado Clubes de Futbol </h1>

<div class='row'>
    <?php
//    print_r($data);
    foreach ($data as $unaTupla):
        ?>
        <div class="col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-secondary text-center text-white">
                    <h4> <?php echo $unaTupla['Club']; ?>: </h4>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Posicion</th>
                                <th scope="col text-center">Cantidad de Jugadores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($unaTupla['DataClub'] as $datosClub):
                                ?>
                                <tr>
                                    <td> <?php echo $datosClub['posicion'] ?> </td>
                                    <td class="text-center"> <?php echo $datosClub['CantidadJugadores']; ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <a href="<?= Url::toRoute(['jugador/listarjugadoresclub', 'club' => $unaTupla['Club']]); ?>" class="btn btn-secondary" role="button"> Mas Detalles... </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
