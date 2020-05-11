<?php

namespace app\controllers;

use Yii;
use app\models\Club;
use app\models\ClubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClubController implements the CRUD actions for Club model.
 */
class ClubController extends Controller
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
     * Lists all Club models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Club model.
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
     * Creates a new Club model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Club();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idClub]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Club model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idClub]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Club model.
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

    /**
     * METODO listarposicionesclub --> Genera un array asociativo que contiene el nombre del club
     * y el listado de cantidad de jugadores por posicion del mismo 
     * 
     * @return mixed
     */
    public function actionListarposicionesclub() {
         //buscamos los clubes existentes
         $queryClubes = Club::find();
         $clubes = $queryClubes->all();
         $arrayClubes = [];

         foreach ($clubes as $unClub) {

             //creamos una query personalizada para obtener la cantidad de jugadores por posicion
             //de un equipo particular. Hace uso de un objeto query de Yii
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

             //agregamos los datos correspondientes al club al arreglo de clubes
             array_push($arrayClubes, ['Club' => $unClub->Nombre, 'DataClub' => $dataClub]);
         }
         return $this->render('listarposicionesclub', ['data' => $arrayClubes]);
     }

    /**
     * Finds the Club model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Club the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Club::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
