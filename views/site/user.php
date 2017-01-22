<?php
/**
 * @var $this yii\web\View
 * @var $user object
 */
$this->title = $user->name . ' - info';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-container">
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <img src="<?= $user->avatar_url ?>">
            </div>
            <div class="row">
                <a class="btn btn-default like-btn-user" href="#" id="33123">Like</a>
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
                Blog : <a href="<?= $user->blog ?>"><?= $user->blog ?></a>
            </div>
            <div class="row text">
                Followers : <?= $user->followers ?>
            </div>
        </div>
    </div>
</div>
