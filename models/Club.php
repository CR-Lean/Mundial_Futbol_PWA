<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property int $idClub
 * @property string $Ciudad
 * @property string $Nombre
 *
 * @property Jugador[] $jugadors
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ciudad', 'Nombre'], 'required'],
            [['Ciudad', 'Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idClub' => 'Id Club',
            'Ciudad' => 'Ciudad',
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
        return $this->hasMany(Jugador::className(), ['idClub' => 'idClub']);
    }
}
