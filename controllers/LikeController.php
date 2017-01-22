<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 22.01.2017
 * Time: 22:37
 */

namespace app\controllers;


use app\models\Like;
use yii\base\Controller;

class LikeController extends Controller
{
    public function actionTest(){
        $like = Like::find()->all();
        var_dump($like);
    }
}