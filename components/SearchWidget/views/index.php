<?php
/**
 * @var $this yii\web\View
 */
use yii\helpers\Url;

?>

<form class='navbar-form navbar-right' role='search' action="<?= Url::to(['/site/search']) ?>">
    <div class='form-group has-feedback'>
        <input id='searchbox' type='text' placeholder='Search' class='form-control' name="s">
        <span id='searchicon' class='fa fa-search form-control-feedback'></span>
    </div>
</form>
