<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VentaDetalle".
 *
 * @property int $id
 * @property int $cant
 * @property int $pv
 * @property int $idventa
 * @property int $idproducto
 *
 * @property Venta $venta
 * @property Producto $producto
 */
class VentaDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'VentaDetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cant', 'pv', 'idventa', 'idproducto'], 'required'],
            [['cant', 'pv', 'idventa', 'idproducto'], 'integer'],
            [['idventa'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['idventa' => 'id']],
            [['idproducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idproducto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cant' => 'Cant',
            'pv' => 'Pv',
            'idventa' => 'Idventa',
            'idproducto' => 'Idproducto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['id' => 'idventa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'idproducto']);
    }
}
