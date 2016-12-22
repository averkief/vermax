<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "firmwares".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Clients[] $clients
 */
class Firmwares extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firmwares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['firmware' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FirmwaresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FirmwaresQuery(get_called_class());
    }
}
