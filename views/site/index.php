<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Asociación Mundial de Futbol';
?>
<div class="site-index">

  <div class="jumbotron">
    <h1>Mundial de Fubtol</h1>

  </div>



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
