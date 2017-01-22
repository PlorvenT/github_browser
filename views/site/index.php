<?php

/**
 * @var $this yii\web\View
 * @var $projectInfo object
 * @var $contributors object
 */
use app\components\LikeWidget\LikeWidget;
use app\models\Like;
use yii\helpers\Url;

$this->title = 'MobiDev GitHub Browser - Homepage';
$this->params['breadcrumbs'][] = 'Homepage';
?>
<head>
    <script type="text/javascript">
        var csrfVar = '<?=Yii::$app->request->getCsrfToken()?>';
    </script>
</head>

<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
                <h2><?= $projectInfo->full_name ?></h2>

                <div class="property-main">
                    Description : <?= $projectInfo->description ?>
                </div>
                <div class="property-main">
                    Watchers : <?= $projectInfo->watchers_count ?>
                </div>
                <div class="property-main">
                    Forks : <?= $projectInfo->forks_count ?>
                </div>
                <div class="property-main">
                    Open issues : <?= $projectInfo->open_issues_count ?>
                </div>
                <div class="property-main">
                    Homepage : <a href="<?= $projectInfo->homepage ?>"> <?= $projectInfo->homepage ?> </a>
                </div>
                <div class="property-main">
                    GitHub repo : <a href="<?= $projectInfo->html_url ?>"> <?= $projectInfo->html_url ?> </a>
                </div>
                <div class="property-main">
                    Created at : <?= $projectInfo->created_at ?>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Contributors:</h2>

                <?php if ($contributors) : ?>
                    <?php foreach ($contributors as $contributor) : ?>
                        <div class="main-user-info">
                            <a href="<?= Url::to(['/site/user', 'username' => $contributor->login])  ?>" class="username"><?= $contributor->login ?></a>
                            <?= LikeWidget::widget(['objectId' => $contributor->id , 'likeType' => Like::OBJECT_TYPE_USER])?>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
        </div>

    </div>
</div>
