<?php

namespace app\controllers;

use Yii;
use app\models\Pais;
use app\models\PaisSearch;
use app\models\Jugador;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;


/**
 * PaisController implements the CRUD actions for Pais model.
 */
class PaisController extends Controller
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
     * Lists all Pais models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pais model.
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
     * Creates a new Pais model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pais();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPais]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pais model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPais]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pais model.
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
    *Se recibe un id de un pais y se lista todos los jugadores que están asiciado
    *a ese pais.
    */

    public function actionListaJugadores($id, $nombre)
    {
      // Consulta a la base de datos, con la condicion del id del Jugador
      $query = Jugador::find()
                  ->asArray()
                  ->select([
                    'jugador.*',
                    'club.Nombre AS Club',
                  ])
                  ->innerJoinWith('idClub')
                  ->where(['jugador.idPais' => $id]);
      // Creamos una nueva instancia de Pagination para mostrar una Cantidad
      //de informar mas reducida
      $paginacion = new Pagination([
        'defaultPageSize' => 10,
        'totalCount' => $query->count(),
      ]);

      $jugadores = $query->offset($paginacion->offset)
                  ->limit($paginacion->limit)
                  ->all();

      return $this->render('lista-jugadores', [
        'lista' => $jugadores,
        'paginacion' => $paginacion,
        'nombre_pais' => $nombre,
      ]);
    }
    /**
     * Mustra la cantidad de los jugadores que tiene los paises.
     *
     * @return string
     */
    public function actionCantidadJugadores()
    {
      //Se consulta a la base datos en buqueda de los $paises
      //luego con el identificador del pais se buscan los $jugadores
      //que pertenecen al dicho pais y se suman a un contador.
      $query = Pais::find();
      $paises = $query->all();
      $paisCount = [];
      foreach ($paises as $pais) {
        $queryJugador = Jugador::find()
        ->where(['idPais' => $pais->idPais])
        ->count();
        array_push($paisCount, ['idPais' => $pais->idPais,'Pais' => $pais->Nombre, 'Cantidad' => $queryJugador]);
      }
        return $this->render('cantidad-jugadores', ['data' => $paisCount]);
    }

    /**
     * Finds the Pais model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pais the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pais::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
