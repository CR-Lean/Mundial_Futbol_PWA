<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Jugadores - ' . $nombre_pais;
$this->params['breadcrumbs'][] = ['label' => 'Asociación Mundial de Futbol', 'url' => ['cantidad-jugadores']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<h1> Selección de <?= Html::encode("{$nombre_pais}")?></h1>

<div class="jugadorPais-view">
<div class="row">
  <div class="col-md-12">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nombre del Jugador</th>
          <th scope="col">Posicion en la que Juega</th>
          <th scope="col">Fecha de Contrato</th>
          <th scope="col">Juega en el Club</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($lista as $jugador): ?>
        <tr>
          <td scope="row"><?= Html::encode("{$jugador['Nombre']}")?></th>
          <td scope="row"><?= Html::encode("{$jugador['Posicion']}")?></td>
          <td scope="row"><?= Html::encode("{$jugador['Fecha']}")?></td>
          <td scope="row"><?= Html::encode("{$jugador['Club']}")?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>


  </div>
</div>
<?= LinkPager::widget([
  'pagination' => $paginacion,
  'prevPageLabel' => 'Anterior',
  'nextPageLabel' => 'Siguiente',
  ])?>
</div>
<a href="<?= Url::toRoute(['pais/cantidad-jugadores']); ?>">Volver</a>
