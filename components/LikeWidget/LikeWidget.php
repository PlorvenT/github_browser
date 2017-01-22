<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 22.01.2017
 * Time: 22:48
 */

namespace app\components\LikeWidget;


use app\models\Like;
use yii\base\Widget;

class LikeWidget extends Widget
{
    public $objectId;
    public $likeType;

    public function run()
    {
        /** @var Like $like */
        $like = Like::find()
            ->where([
                'type' => $this->likeType,
                'object' => $this->objectId
            ])
            ->one();
        if ($like){
            $liked = $like->status;
        } else {
            $liked = Like::STATUS_UNLIKED;
        }

        return $this->render('index', [
            'liked' => $liked,
            'type' => $this->likeType,
            'object' => $this->objectId,
        ]);
    }
}