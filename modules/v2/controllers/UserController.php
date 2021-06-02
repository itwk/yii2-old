<?php


namespace app\modules\v2\controllers;
use phpDocumentor\Reflection\Types\This;
use yii\rest\ActiveController;

class UserController extends ActiveController
{

    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
//                'only' => ['index', 'view'],
                'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
    ],
    ],
];
}

    public $modelClass = 'app\modules\v2\models\User';



}