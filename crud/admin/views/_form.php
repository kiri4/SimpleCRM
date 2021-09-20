<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>

    <?php foreach ($generator->getColumnNames() as $attribute) {
        if (in_array($attribute, $safeAttributes)) {
            if (strpos($attribute, 'img') !== false) {
                echo '    <?= $form->field($model, \'' . $attribute . '\')->widget(mihaildev\elfinder\InputFile::class, [
        \'filter\' => \'image\',
        \'template\' => \'<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>\',
        \'options\' => [\'class\' => \'form-control\'],
        \'buttonOptions\' => [\'class\' => \'btn btn-default\'],
        \'multiple\' => false
    ]); ?>' . "\n\n";
            } else {
                if ($attribute == 'active') {
                    echo '    <?= $form->field($model, \'active\')->checkbox() ?>';
                } else {
                    echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
                }
            }
        }
    } ?>
    <div class="form-group">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Сохранить') ?>, ['class' => 'btn btn-success'])
        ?>
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Сохранить и выйти') ?>, ['name'=>'exit',
        'value'=>1, 'class' => 'btn btn-warning'])
        ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
