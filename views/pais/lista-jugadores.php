<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Jugadores - '.$nombre_pais;
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="jugadorPais-view">
<div class="row justify-content-center">
  <div class="col-md-6">

    <?php foreach ($lista as $jugador): ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><label>Nombre del Jugador:</label> <?=$jugador['Nombre']?></li>
        <li class="list-group-item"><label>Posicion en la que Juega:</label> <?=$jugador['Posicion']?></li>
        <li class="list-group-item"><label>Fecha de Contrato:</label> <?=$jugador['Fecha']?></li>
        <li class="list-group-item"><label>Juega en el Club:</label> <?=$jugador['Club']?></li>
      </ul>
    <?php endforeach; ?>

      </div>
</div>
<?= LinkPager::widget([
  'pagination' => $paginacion,
  'prevPageLabel' => 'Anterior',
  'nextPageLabel' => 'Siguiente',
  ])?>
</div>
