<?php
/**
 * @var \app\models\Article $article
 */

use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel-heading"><?= Html::encode($article->title) ?></div>
    <div class="panel-body">
        <?= $article->body ?>
    </div>
    <div class="panel-footer">
        <strong>Автор:</strong> <?= Html::encode($article->user->username) ?>
        (<?= Yii::$app->formatter->asDatetime($article->created_at * 1000); ?>)
    </div>
</div>

