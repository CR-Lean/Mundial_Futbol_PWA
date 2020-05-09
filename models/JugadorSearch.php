<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jugador;

/**
 * JugadorSearch represents the model behind the search form of `app\models\Jugador`.
 */
class JugadorSearch extends Jugador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idJugador', 'idPais', 'idClub'], 'integer'],
            [['Nombre', 'Fecha', 'Posicion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Jugador::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idJugador' => $this->idJugador,
            'idPais' => $this->idPais,
            'idClub' => $this->idClub,
            'Nombre' => $this->Nombre,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'Posicion', $this->Posicion]);

        return $dataProvider;
    }
}
