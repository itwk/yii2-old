<?php

namespace app\modules\v2\models;

use Yii;

use app\modules\v2\models\User;

/**
 * This is the model class for collection "post".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Post extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['tbdb', 'posts'];
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
            'userId',
            'placeId',
            'organisationId',
            'text',
            'rating',
            'timePassed',
            'createdAt',
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
            'id' => function($model) {
                return $model->_id;
            },
            'user',
            'place',
            'organisation',
            'text',
            'rating',
            'timePassed' => function($model){
                return time() - $model->createdAt;
            },
        ];
    }

    public function getUser(){

        return User::findOne($this->userId);

    }

    public function getPlace(){
        return Place::findOne($this->placeId);
    }

    public function getOrganisation(){
        return Organisation::findOne($this->organisationId);
    }



}
