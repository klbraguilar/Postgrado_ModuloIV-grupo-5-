<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprobante".
 *
 * @property int $id
 * @property string $fecha
 * @property int $nro
 * @property string $glosa
 * @property int $idtipo
 *
 * @property Tipo $tipo
 * @property Transaccion[] $transaccions
 */
class Comprobante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comprobante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'nro', 'glosa'], 'required'],
            [['fecha'], 'safe'],
            [['nro', 'idtipo'], 'integer'],
            [['glosa'], 'string'],
            [['idtipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['idtipo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'nro' => 'Nro',
            'glosa' => 'Glosa',
            'idtipo' => 'Idtipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'idtipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccions()
    {
        return $this->hasMany(Transaccion::className(), ['idcomp' => 'id']);
    }
}
