<?php

use yii\helpers\Url;

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <table class="table">
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th>
                            <a href="<?= Url::to(['user/show', 'id' => $user->id]); ?>"><?= $user->username ?></a>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>