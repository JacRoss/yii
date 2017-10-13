<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Управление пользователем: <strong><?= $user->username ?></strong>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                    <div class="panel-body">
                        <?= $form->field($model, 'role')->dropDownList($roles) ?>

                        <?= $form->field($model, 'expireIn')->widget(\kartik\datetime\DateTimePicker::class, [
                            'options' => ['placeholder' => 'Enter event time ...'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'language' => 'ru',
                            ]]);
                        ?>
                    </div>
                    <div class="panel-footer">
                        <?= Html::submitButton('Подписать', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
