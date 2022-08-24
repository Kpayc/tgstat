<?php

use frontend\Modules\Cabinet\Forms\CreateForm;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model CreateForm */
/* @var $form ActiveForm */
?>
<div class="link-create">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => ' col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
    <div class="form-group">
        <?= $form->field($model, 'url') ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Добавить ссылку', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>