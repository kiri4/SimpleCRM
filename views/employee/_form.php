<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee|\app\models\EmployeeCreateForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $model instanceof \app\models\EmployeeCreateForm? $form->field($model, 'department_id')->dropDownList($this->context->departments) : '' ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success'])
        ?>
        <?= Html::submitButton('Сохранить и выйти', ['name' => 'exit',
            'value' => 1, 'class' => 'btn btn-warning'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
