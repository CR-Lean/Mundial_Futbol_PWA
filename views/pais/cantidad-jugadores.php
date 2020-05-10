<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Asociación Mundial de Futbol';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="text-center mb-4"> Cantidad de Jugadores por Pais </h1>


  <div class="body-content">
    <div class="row">
    <?php foreach ($data as $paisJugadores): ?>

      <div class="col-sm-3">
        <div class = "panel panel-info">
           <div class = "panel-heading">
              <h3 class = "panel-title"><?= $paisJugadores['Pais']?></h3>

           </div>

           <div class = "panel-body">
              <?= "Cant. Jugadores: ".$paisJugadores['Cantidad']?></br>
              <a href="<?= Url::toRoute(['pais/lista-jugadores', 'id' => $paisJugadores['idPais'], 'nombre' => $paisJugadores['Pais']]);?>" class="card-link">Mas Detalles...</a>

           </div>
        </div>

      </div>

    <?php endforeach; ?>

    </div>
  </div>

</div>
