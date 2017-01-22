<?php
/**
 * @var $this yii\web\View
 * @var $user object
 */
use app\components\LikeWidget\LikeWidget;
use app\models\Like;

$this->title = $user->name . ' - info';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <script type="text/javascript">
        var csrfVar = '<?=Yii::$app->request->getCsrfToken()?>';
    </script>
</head>

<div class="user-container">
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <img src="<?= $user->avatar_url ?>">
            </div>
            <div class="row">
                <div class="like-btn-user">
                    <?= LikeWidget::widget(['objectId' => $user->id , 'likeType' => Like::OBJECT_TYPE_USER])?>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <h2 class="mb-50"><?= $user->name ?></h2>
            </div>
            <div class="row text">
                <?= $user->login ?>
            </div>
            <div class="row text">
                Company : <?= $user->company ?>
            </div>
            <div class="row text">
                Blog : <a href="<?= $user->blog ?>" target="_blank"><?= $user->blog ?></a>
            </div>
            <div class="row text">
                Followers : <?= $user->followers ?>
            </div>
        </div>
    </div>
</div>
