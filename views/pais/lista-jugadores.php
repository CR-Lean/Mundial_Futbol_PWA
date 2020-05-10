<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Jugadores - ' . $nombre_pais;
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="jugadorPais-view">
<div class="row justify-content-center">
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
          <th scope="row"><?=$jugador['Nombre']?></th>
          <td scope="row"><?=$jugador['Posicion']?></td>
          <td scope="row"><?=$jugador['Fecha']?></td>
          <td scope="row"><?=$jugador['Club']?></td>
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
