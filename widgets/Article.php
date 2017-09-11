<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 11.09.17
 * Time: 20:59
 */

namespace app\widgets;


use yii\base\Widget;

class Article extends Widget
{
    public $article;

    public function run()
    {
        return $this->render('article', ['article' => $this->article]);
    }
}