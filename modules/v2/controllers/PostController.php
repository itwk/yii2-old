<?php


namespace app\modules\v2\controllers;
use app\modules\v2\models\Post;
use phpDocumentor\Reflection\Types\Array_;
use yii\rest\ActiveController;
use Yii;

class PostController extends ActiveController
{
    protected $data_for_view = null;
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

    public $modelClass = 'app\modules\v2\models\Post';

    public function actions()
    {

        $actions = parent::actions();
        unset($actions['view']);
        return $actions;
    }

    public function actionView($id)
    {
        $data_view = Post::findOne($id);

        if (!$data_view){
            $response = Yii::$app->response;
            $response->statusCode = 499;
        }

        return $data_view;
    }


}