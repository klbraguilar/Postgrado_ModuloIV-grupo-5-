<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plancuentas".
 *
 * @property int $id
 * @property string $cuenta
 * @property string $nombre
 * @property int $nivel
 * @property int $idpadre
 *
 * @property Cliente[] $clientes
 * @property Plancuentas $padre
 * @property Plancuentas[] $plancuentas
 * @property Producto[] $productos
 * @property Transaccion[] $transaccions
 */
class Plancuentas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plancuentas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cuenta', 'nombre', 'nivel'], 'required'],
            [['cuenta', 'nombre'], 'string'],
            [['nivel', 'idpadre'], 'integer'],
            [['idpadre'], 'exist', 'skipOnError' => true, 'targetClass' => Plancuentas::className(), 'targetAttribute' => ['idpadre' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuenta' => 'Cuenta',
            'nombre' => 'Nombre',
            'nivel' => 'Nivel',
            'idpadre' => 'Idpadre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['idcuentas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadre()
    {
        return $this->hasOne(Plancuentas::className(), ['id' => 'idpadre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlancuentas()
    {
        return $this->hasMany(Plancuentas::className(), ['idpadre' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['idcuenta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccions()
    {
        return $this->hasMany(Transaccion::className(), ['idplc' => 'id']);
    }
}
