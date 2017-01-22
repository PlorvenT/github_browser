<?php
/**
 * @var $this yii\web\View
 * @var $liked integer
 * @var $type integer
 * @var $object string
 */
use app\models\Like;

if ($liked == Like::STATUS_LIKED){
    echo '<a class="btn btn-default like-btn" href="#" id="' . $object . '" like-type=' . $type . ' liked=' . (integer)$liked . '>Unlike</a>';
} elseif ($liked == Like::STATUS_UNLIKED) {
    echo '<a class="btn btn-default like-btn" href="#" id="' . $object . '" like-type=' . $type . ' liked=' . (integer)$liked . '>Like</a>';
}
?>


