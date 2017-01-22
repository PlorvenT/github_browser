<?php

/**
 * @var $this \yii\web\View
 * @var $s string
 * @var $projects array
 */
use app\components\LikeWidget\LikeWidget;
use app\models\Like;
use yii\helpers\Url;

$this->title = 'Search ' . $s;

$this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <script type="text/javascript">
        var csrfVar = '<?=Yii::$app->request->getCsrfToken()?>';
    </script>
</head>

<div class="search-result">
    <?php if ($s) : ?>
        <p class="lead">For search term "<?= $s ?>" found:</p>
    <?php else : ?>
        <p class="lead">Search form empty</p>
    <?php endif; ?>

    <?php foreach ($projects as $project) : ?>
        <div class="project-short">
            <div class="row mb-10">
                <div class="col-lg-3">
                    <a href="<?= \yii\helpers\Url::to(['/site/index', 'id' => $project->id])?>"><?= $project->name ?></a>
                </div>
                <div class="col-lg-3">
                    <?php if ($project->homepage) : ?>
                        <?php
                        $textHomepage = strlen($project->homepage) > 30 ? substr($project->homepage, 0, 30) . '...' : $project->homepage;
                        ?>
                        <a href="<?= $project->homepage?>" target="_blank"><?= $textHomepage ?></a>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <a href="<?= Url::to(['/site/user', 'username' => $project->owner->login]) ?>"><?= $project->owner->login ?></a>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-lg-12">
                    <?= $project->description ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-5">
                    wathcers: <?= $project->watchers_count ?>
                </div>
                <div class="col-lg-4 mt-5">
                    forks: <?= $project->forks_count ?>
                </div>
                <div class="col-lg-4">
                    <?= LikeWidget::widget(['objectId' => $project->id, 'likeType' => Like::OBJECT_TYPE_REPO])?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>