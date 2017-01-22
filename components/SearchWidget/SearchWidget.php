<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 22.01.2017
 * Time: 17:46
 */

namespace app\components\SearchWidget;


use yii\base\Widget;

class SearchWidget extends Widget
{
    public function run()
    {
        return $this->render('index');
    }
}