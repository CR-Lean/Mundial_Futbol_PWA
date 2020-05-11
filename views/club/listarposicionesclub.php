<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Listado Clubes de Futbol";
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="text-center mb-4"> Listado Clubes de Futbol </h1>
<div id="info-club">
    <div class='row'>
        <?php
//    print_r($data);
        foreach ($data as $unaTupla):
            ?>
            <div class="col-sm-4">
                <!-- Inicio Panel Club-->
                <div class="panel panel-info">
                    <div class="panel-heading text-white">
                        <h5 class = "panel-title text-center"> <?= Html::encode("{$unaTupla['Club']}"); ?>: </h5>
                    </div>

                    <!-- Data Posiciones Club-->
                    <div class="panel-body">
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
                                        <td> <?= Html::encode("{$datosClub['posicion']}"); ?> </td>
                                        <td class="text-center"> <?= Html::encode("{$datosClub['CantidadJugadores']}"); ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <a href="<?= Url::toRoute(['jugador/listarjugadoresclub', 'club' => $unaTupla['Club']]); ?>" class="btn btn-secondary" role="button"> Mas Detalles... </a>
                    </div>
                    <!-- Data Posiciones Club-->
                </div>
                <!-- Fin Panel Club-->
            </div>
        <?php endforeach; ?>
    </div>
</div>
