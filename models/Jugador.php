<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jugador".
 *
 * @property int $idJugador
 * @property int $idPais
 * @property int $idClub
 * @property int $Nombre
 * @property string $Fecha
 * @property string|null $Posicion
 *
 * @property Pais $idPais0
 * @property Club $idClub0
 */
class Jugador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jugador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPais', 'idClub', 'Nombre', 'Fecha'], 'required'],
            [['idPais', 'idClub'], 'integer'],
			[['Nombre'], 'string', 'max' => 150],
            [['Fecha'], 'safe'],
            [['Posicion'], 'string', 'max' => 150],
            [['idPais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['idPais' => 'idPais']],
            [['idClub'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['idClub' => 'idClub']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJugador' => 'Id Jugador',
            'idPais' => 'Id Pais',
            'idClub' => 'Id Club',
            'Nombre' => 'Nombre',
            'Fecha' => 'Fecha',
            'Posicion' => 'Posicion',
        ];
    }

    /**
     * Gets query for [[IdPais0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais0()
    {
        return $this->hasOne(Pais::className(), ['idPais' => 'idPais']);
    }

    /**
     * Gets query for [[IdClub0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdClub0()
    {
        return $this->hasOne(Club::className(), ['idClub' => 'idClub']);
    }
}
