<?php

/**
 * @var \app\models\Article $weekly
 */

?>


<?php foreach ($weekly as $day => $categories): ?>
    <h1><?= $day ?></h1>
    <?php foreach ($categories as $category => $articles): ?>
        <h2><?= $category ?></h2>
        <?php foreach ($articles as $article): ?>
            <?= \app\widgets\Article::widget(['article' => $article]); ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
