<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nombre
 * @property int $idcuentas
 *
 * @property Plancuentas $cuentas
 * @property Venta[] $ventas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'idcuentas'], 'required'],
            [['nombre'], 'string'],
            [['idcuentas'], 'integer'],
            [['idcuentas'], 'exist', 'skipOnError' => true, 'targetClass' => Plancuentas::className(), 'targetAttribute' => ['idcuentas' => 'id']],
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
            'idcuentas' => 'Idcuentas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasOne(Plancuentas::className(), ['id' => 'idcuentas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idcliente' => 'id']);
    }
}
