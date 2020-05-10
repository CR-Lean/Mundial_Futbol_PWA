<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Jugadores ".$club;
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="text-center"> Jugadores <?php echo $club; ?> </h1>

<div class='row'>
    <?php
//    print_r($dataJugadores);
    foreach ($dataJugadores as $unaTupla):
        ?>
        <div class="col-sm-8 col-md-4 mt-4">
            <div class="card">
                <img class="card-img-top" width="200" height="150" src="<?= Yii::getAlias("@web/images/default.jpg") ?>" title="<?php echo $unaTupla['Nombre'] ?>">
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th> Nombre: </td>
                                <td> <?php echo $unaTupla['Nombre'] ?> </td>
                            </tr>

                            <tr>
                                <th> Posicion: </td>
                                <td> <?php echo $unaTupla['Posicion'] ?> </td>
                            </tr>
                            <tr>
                                <th> Fecha: </td>
                                <td> <?php echo $unaTupla['Fecha'] ?> </td>
                            </tr>
                            </tr>
                            <tr>
                                <th> Nacionalidad: </td>
                                <td> <?php echo $unaTupla['nombrePais'] ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<a href="<?= Url::to(['jugador/listarposicionesclub']); ?>">Volver</a>
