<?php

namespace app\modules\v2\models;

use Yii;

/**
 * This is the model class for collection "post".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class User extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['tbdb', 'users'];
    }

    /**
     * @return \yii\mongodb\Connection the MongoDB connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'slug ',
            'firstName ',
            'secondName ',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
        ];
    }

    public function fields()
    {
        return [
            '_id',
            'slug ',
            'firstName ',
            'secondName ',
        ];
    }
}
