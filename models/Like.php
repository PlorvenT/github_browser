<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property integer $id
 * @property string $object
 * @property integer $status
 * @property integer $type
 */
class Like extends \yii\db\ActiveRecord
{
    const STATUS_LIKED = 1;
    const STATUS_UNLIKED = 2;

    const OBJECT_TYPE_USER = 1;
    const OBJECT_TYPE_REPO = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object', 'status', 'type'], 'required'],
            [['status', 'type'], 'integer'],
            [['object'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object' => 'Object',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }
}
