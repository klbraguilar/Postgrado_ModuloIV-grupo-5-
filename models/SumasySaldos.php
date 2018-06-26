<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SumasySaldos".
 *
 * @property int $idsumasaldos
 * @property string $fechainicio
 * @property string $fechafin
 */
class SumasySaldos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'SumasySaldos';
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
            'idsumasaldos' => 'Idsumasaldos',
            'fechainicio' => 'Fechainicio',
            'fechafin' => 'Fechafin',
        ];
    }
}
