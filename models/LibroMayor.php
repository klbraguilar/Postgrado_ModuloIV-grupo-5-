<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "LibroMayor".
 *
 * @property int $idlibromay
 * @property string $fechainicio
 * @property string $fechafin
 * @property int $idcuenta
 */
class LibroMayor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'LibroMayor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechainicio', 'fechafin', 'idcuenta'], 'required'],
            [['fechainicio', 'fechafin'], 'safe'],
            [['idcuenta'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlibromay' => 'Idlibromay',
            'fechainicio' => 'Fechainicio',
            'fechafin' => 'Fechafin',
            'idcuenta' => 'Idcuenta',
        ];
    }
}
