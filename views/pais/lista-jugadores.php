<?php

use yii\widgets\LinkPager;

$this->title = 'Jugadores - ' . $nombre_pais;
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="jugadorPais-view">
<<<<<<< HEAD
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
=======
    <div class="row justify-content-center">
        <?php foreach ($lista as $jugador): ?>
            <div class="col-md-6">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <img class="card-img-top" width="200" height="150" src="<?= Yii::getAlias("@web/images/default.jpg") ?>" title="<?php echo $jugador['Nombre'] ?>"> </li>
                    <li class="list-group-item"><label>Nombre del Jugador:</label> <?= $jugador['Nombre'] ?></li>
                    <li class="list-group-item"><label>Posicion en la que Juega:</label> <?= $jugador['Posicion'] ?></li>
                    <li class="list-group-item"><label>Fecha de Contrato:</label> <?= $jugador['Fecha'] ?></li>
                    <li class="list-group-item"><label>Juega en el Club:</label> <?= $jugador['Club'] ?></li>
                </ul>

            </div>
        <?php endforeach; ?>
    </div>
    <?=
    LinkPager::widget([
        'pagination' => $paginacion,
        'prevPageLabel' => 'Anterior',
        'nextPageLabel' => 'Siguiente',
    ])
    ?>
>>>>>>> eccaeb6ab25fb3f4ed8d2850e9683ee045439669
</div>
