<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Jugadores " . $club;
$this->params['breadcrumbs'][] = ['label' => 'Listado Clubes de Futbol', 'url' => ['club/listarposicionesclub']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="text-center"> Jugadores <?= Html::encode("{$club}"); ?> </h1>

<div class='row'>
    <?php
//    print_r($dataJugadores);
    foreach ($dataJugadores as $unaTupla):
        ?>

        <div class="col-sm-8 col-md-4 mt-4">
            <!-- Inicio Card JugadorClub -->
            <div class="card">
                <!-- Image JugadorClub -->
                <img class="card-img" src="<?= Yii::getAlias("@web/images/default.jpg") ?>" title="<?= Html::encode("{$unaTupla['Nombre']}"); ?>">
                <!-- Image JugadorClub -->

                <!-- Data JugadorClub -->
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th> Nombre: </td>
                                <td> <?= Html::encode("{$unaTupla['Nombre']}"); ?> </td>
                            </tr>

                            <tr>
                                <th> Posicion: </td>
                                <td> <?= Html::encode("{$unaTupla['Posicion']}"); ?> </td>
                            </tr>
                            <tr>
                                <th> Inicio Contrato: </td>
                                <td> <?= Html::encode("{$unaTupla['Fecha']}"); ?> </td>
                            </tr>
                            </tr>
                            <tr>
                                <th> Nacionalidad: </td>
                                <td> <?= Html::encode("{$unaTupla['nombrePais']}"); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Data JugadorClub -->
            </div>
            <!-- Fin Card JugadorClub -->
        </div>
    <?php endforeach; ?>
</div>

<a href="<?= Url::toRoute(['club/listarposicionesclub']); ?>">Volver</a>
