<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Proyecto".
 *
 * @property int $Id
 * @property string $nomb
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Proyecto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomb'], 'required'],
            [['nomb'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'nomb' => 'Nomb',
        ];
    }
}
