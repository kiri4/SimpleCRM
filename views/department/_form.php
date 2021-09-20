<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success'])
        ?>
        <?= Html::submitButton('Сохранить и выйти', ['name'=>'exit',
        'value'=>1, 'class' => 'btn btn-warning'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
