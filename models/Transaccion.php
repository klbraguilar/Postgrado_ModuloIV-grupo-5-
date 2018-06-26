<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaccion".
 *
 * @property int $id
 * @property double $debe
 * @property double $haber
 * @property int $idplc
 * @property int $idcomp
 * @property int $idcc
 *
 * @property Centrocostos $cc
 * @property Plancuentas $plc
 * @property Comprobante $comp
 */
class Transaccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['debe', 'haber'], 'required'],
            [['debe', 'haber'], 'number'],
            [['idplc', 'idcomp', 'idcc'], 'integer'],
            [['idcc'], 'exist', 'skipOnError' => true, 'targetClass' => Centrocostos::className(), 'targetAttribute' => ['idcc' => 'id']],
            [['idplc'], 'exist', 'skipOnError' => true, 'targetClass' => Plancuentas::className(), 'targetAttribute' => ['idplc' => 'id']],
            [['idcomp'], 'exist', 'skipOnError' => true, 'targetClass' => Comprobante::className(), 'targetAttribute' => ['idcomp' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'debe' => 'Debe',
            'haber' => 'Haber',
            'idplc' => 'Idplc',
            'idcomp' => 'Idcomp',
            'idcc' => 'Idcc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCc()
    {
        return $this->hasOne(Centrocostos::className(), ['id' => 'idcc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlc()
    {
        return $this->hasOne(Plancuentas::className(), ['id' => 'idplc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComp()
    {
        return $this->hasOne(Comprobante::className(), ['id' => 'idcomp']);
    }
}
