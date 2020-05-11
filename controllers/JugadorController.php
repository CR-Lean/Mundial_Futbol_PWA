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
class JugadorController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
        $searchModel = new JugadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jugador model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jugador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
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
    public function actionUpdate($id) {
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
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * METODO listarjugadoresclub --> Genera un array asociativo que contiene el nombre del club
     * y el listado de los jugadores del mismo. 
     * 
     * @param String $club
     * @return type
     */
    public function actionListarjugadoresclub($club) {
        //creamos una query personalizada para obtener los datos de los jugadores de un equipo particular
        //utilizando un objeto query de Yii
        $queryJugadoresClub = (new \yii\db\Query())
                ->select(['jugador.*', 'pais.nombre as nombrePais'])          //parametros seleccionados
                //                    ->distinct('jugador.posicion')
                ->from('jugador')                                                 //tabla
                ->innerJoin('club', 'jugador.idClub = club.idClub')               //relacion tabla club
                ->innerJoin('pais', 'jugador.idPais = pais.idPais')               //relacion tabla pais
                ->where(['club.nombre' => $club]);                                //condicion: 
        //                    ->groupBy(['jugador.posicion']);                    //agrupamiento

        //obtenemos el array asociativo a partir de la query
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
    protected function findModel($id) {
        if (($model = Jugador::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
