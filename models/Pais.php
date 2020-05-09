<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property int $idPais
 * @property string $Nombre
 *
 * @property Jugador[] $jugadors
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPais' => 'Id Pais',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Jugadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJugadors()
    {
        return $this->hasMany(Jugador::className(), ['idPais' => 'idPais']);
    }
}
