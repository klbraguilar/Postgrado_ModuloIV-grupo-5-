<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BalanceGeneral".
 *
 * @property int $idbalance
 * @property string $fechainicio
 * @property string $fechafin
 */
class BalanceGeneral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BalanceGeneral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechainicio', 'fechafin'], 'required'],
            [['fechainicio', 'fechafin'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbalance' => 'Idbalance',
            'fechainicio' => 'Fechainicio',
            'fechafin' => 'Fechafin',
        ];
    }
}
