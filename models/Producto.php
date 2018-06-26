<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string $nombre
 * @property int $idcuenta
 *
 * @property Plancuentas $cuenta
 * @property VentaDetalle[] $ventaDetalles
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'idcuenta'], 'required'],
            [['nombre'], 'string'],
            [['idcuenta'], 'integer'],
            [['idcuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Plancuentas::className(), 'targetAttribute' => ['idcuenta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'idcuenta' => 'Idcuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta()
    {
        return $this->hasOne(Plancuentas::className(), ['id' => 'idcuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaDetalles()
    {
        return $this->hasMany(VentaDetalle::className(), ['idproducto' => 'id']);
    }
}
