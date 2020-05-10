<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Asociación Mundial de Futbol';
?>


<div class="site-index">

    <div class="jumbotron">
        <h1> Trabajo Práctico N°3 : Yii2 </h1>
    </div>

    <div class="body-content">
        <div class="row">
            <!-- Card for Listado Paises -->
            <div class="col-md-6">
                    <div class = "panel panel-info" style="padding-bottom: 30px;">
                        <div class = "panel-heading">
                            <h3 class = "panel-title text-center"> Listado Paises </h3>
                        </div>

                        <div class = "panel-body">
                            <p> Permite visualizar la información correspondiente a los jugadores de cada pais. </p>
                            <a href="<?= Url::toRoute(['pais/cantidad-jugadores']);?>" class="card-link">Acceder...</a>
                        </div>
                    </div>
            </div>
            <!-- END Card for Listado Paises -->

            <!-- Card for Listado Clubes -->
            <div class="col-md-6">
                    <div class = "panel panel-info" style="padding-bottom: 30px;">
                        <div class = "panel-heading">
                            <h3 class = "panel-title text-center"> Listado Clubes </h3>
                        </div>

                        <div class = "panel-body no-linkstyle">
                            <p> Permite visualizar la información correspondiente a los jugadores de cada club. </p>
                            <a href="<?= Url::toRoute(['club/listarposicionesclub']);?>" class="card-link">Acceder...</a>
                        </div>
                    </div>
            </div>
            <!-- END Card for Listado Clubes -->
        </div>

        <div class="row">

            <!-- Card for ABM Pais -->
            <div class="col-md-4">
                    <div class = "panel panel-info">
                        <div class = "panel-heading">
                            <h3 class = "panel-title text-center"> ABM Paises </h3>
                        </div>

                        <div class = "panel-body">
                            <p> Permite realizar tareas de mantenimiento en la tabla pais </p>
                            <a href="<?= Url::toRoute(['pais/index']);?>" class="card-link">Acceder...</a>
                        </div>
                    </div>
            </div>
            <!-- Card for ABM Pais -->

            <!-- Card for ABM Club -->
            <div class="col-md-4">
                    <div class = "panel panel-info">
                        <div class = "panel-heading">
                            <h3 class = "panel-title text-center"> ABM Club </h3>
                        </div>
                        <div class = "panel-body">
                            <p> Permite realizar tareas de mantenimiento en la tabla club </p>
                            <a href="<?= Url::toRoute(['club/index']);?>" class="card-link">Acceder...</a>
                        </div>
                    </div>
            </div>
            <!-- Card for ABM Paises -->

            <!-- Card for ABM Paises -->
            <div class="col-md-4">
                    <div class = "panel panel-info">
                        <div class = "panel-heading">
                            <h3 class = "panel-title text-center"> ABM Jugador </h3>
                        </div>
                        <div class = "panel-body">
                            <p> Permite realizar tareas de mantenimiento en la tabla Jugador. </p>
                            <a href="<?= Url::toRoute(['jugador/index']);?>" class="card-link">Acceder...</a>
                        </div>
                    </div>
            </div>
            <!-- Card for ABM Paises -->


        </div>
    </div>

</div>
