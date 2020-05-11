<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Jugador]].
 *
 * @see Jugador
 */
class JugadorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Jugador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Jugador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
