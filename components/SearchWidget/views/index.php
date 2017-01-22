<?php
/**
 * @var $this yii\web\View
 */
use yii\helpers\Url;

?>

<form class='navbar-form navbar-right' role='search' action="<?= Url::to(['/site/search']) ?>">
    <div class='form-group has-feedback'>
        <?php if (isset($this->params['search'])) : ?>
            <input id='searchbox' type='text' placeholder='Search' class='form-control' name="s" value="<?= $this->params['search'] ?>">
        <?php else: ?>
            <input id='searchbox' type='text' placeholder='Search' class='form-control' name="s">
        <?php endif; ?>
        <span id="searchclear" class="glyphicon glyphicon-remove-circle"></span>
    </div>
</form>
