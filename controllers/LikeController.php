<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 22.01.2017
 * Time: 22:37
 */

namespace app\controllers;


use app\models\Like;
use Yii;
use yii\base\Controller;

class LikeController extends Controller
{
    public function actionProcessLike(){
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $objectId = $data['objectId'];
            $likeType = $data['likeType'];
            $likeStatus = $data['likeStatus'];

            /* @var $like Like */
            $like = Like::find()
                ->where([
                    'type' => $likeType,
                    'object' => $objectId
                ])
                ->one();

            //if exist like change status else create like
            if ($like){
                $like->status = $likeStatus == Like::STATUS_UNLIKED ? Like::STATUS_LIKED : Like::STATUS_UNLIKED;

                $status = 'update';
            } else {
                $like = new Like();
                $like->type = (int)$likeType;
                $like->object = (string)$objectId;
                $like->status = Like::STATUS_LIKED;

                $status = 'create';
            }

            $like->save();

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['status' => $status];
        }
    }

}