<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JugadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ABM Jugadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jugador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jugador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'idJugador',
            'Nombre',
            'Posicion',
            [
                'attribute' => 'idClub',
                'label' => 'Club',
                'value' => 'idClub0.Nombre',
            ],
            [
                'attribute' => 'idPais',
                'label' => 'Pais',
                'value' => 'idPais0.Nombre',
            ],
            'Fecha',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
