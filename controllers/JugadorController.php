<?php

namespace app\controllers;

use Yii;
use app\models\Club;
use app\models\Jugador;
use app\models\JugadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JugadorController implements the CRUD actions for Jugador model.
 */
class JugadorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jugador models.
     * @return mixed
     */
     public function actionIndex() {
         //buscamos los clubes existentes
         $query = Club::find();
         $Clubes = $query->all();
         $arrayJugadores = [];

         //buscamos las diferentes posiciones que existen
         $queryJugador = Jugador::find()->distinct('posicion')->groupBy('posicion');
         foreach ($Clubes as $unClub) {

             $posiciones = $queryJugador->all();
             $arrayPosiciones = [];

             foreach ($posiciones as $unaPos) {
                 //contamos la cantidad de jugadores que tiene un club en una determinada posicion
                 $prueba = Jugador::find()->where(['idClub' => $unClub->idClub, 'Posicion' => $unaPos->Posicion])->count();

                 array_push($arrayPosiciones, ['Posicion' => $unaPos->Posicion, 'CantidadJugadores' => $prueba]);
             }
             array_push($arrayJugadores, ['Club' => $unClub->Nombre, 'Data' => $arrayPosiciones]);
         }
         return $this->render('index', ['data' => $arrayJugadores]);
     }


    /**
     * Displays a single Jugador model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jugador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jugador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idJugador]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jugador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idJugador]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jugador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }






    public function actionListarposicionesclub() {
         //buscamos los clubes existentes
         $queryClubes = Club::find();
         $clubes = $queryClubes->all();
         $arrayClubes = [];

         foreach ($clubes as $unClub) {

             //creamos una query personalizada utilizando un objeto query de Yii
             $queryJugadores = (new \yii\db\Query())
 //            $queryJugador = Jugador::find()
                     ->select(['jugador.posicion', 'count(*) as CantidadJugadores']) //parametros seleccionados
 //                    ->distinct('jugador.posicion')
                     ->from('jugador')                                               //tabla
                     ->innerJoin('club', 'jugador.idClub = club.idClub')             //relacion tablas
                     ->where(['jugador.idclub' => $unClub->idClub])                  //condicion
                     ->groupBy(['jugador.posicion']);                                //agrupamiento

             //obtenemos el array asociativo a partir de la query
             $dataClub = $queryJugadores->all();

             //agregamos los datos correspondientes al club
             array_push($arrayClubes, ['Club' => $unClub->Nombre, 'DataClub' => $dataClub]);
         }
         return $this->render('listarposicionesclub', ['data' => $arrayClubes]);
     }

     public function actionListarjugadoresclub($club) {
         //buscamos los clubes existentes
         $queryJugadoresClub = (new \yii\db\Query())
 //            $queryJugador = Jugador::find()
                     ->select(['jugador.*', 'pais.nombre as nombrePais'])          //parametros seleccionados
 //                    ->distinct('jugador.posicion')
                     ->from('jugador')                                                 //tabla
                     ->innerJoin('club', 'jugador.idClub = club.idClub')               //relacion tablas
                     ->innerJoin('pais', 'jugador.idPais = pais.idPais')               //relacion tablas
                     ->where(['club.nombre' => $club]);                          //condicion
 //                    ->groupBy(['jugador.posicion']);                                //agrupamiento

 //        $queryJugadoresClub = Club::find();
 //        $clubes = $queryClubes->all();
 //        $arrayClubes = [];
         $dataJugadoresClub = $queryJugadoresClub->all();

         return $this->render('listarjugadoresclub', ['club' => $club, 'dataJugadores' => $dataJugadoresClub]);
     }







    /**
     * Finds the Jugador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jugador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jugador::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
