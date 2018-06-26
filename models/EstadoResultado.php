<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EstadoResultado".
 *
 * @property int $idestadores
 * @property string $fechainicio
 * @property string $fechafin
 */
class EstadoResultado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EstadoResultado';
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
            'idestadores' => 'Idestadores',
            'fechainicio' => 'Fechainicio',
            'fechafin' => 'Fechafin',
        ];
    }
}
