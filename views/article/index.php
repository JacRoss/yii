<?php
/**
 * @var \app\models\Article[] $articles
 */

use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <select id="search" class="form-control"></select>
        </div>
    </div>
</div>

<?php foreach ($articles as $article): ?>
    <?= \app\widgets\Article::widget(['article' => $article]); ?>
<?php endforeach; ?>
