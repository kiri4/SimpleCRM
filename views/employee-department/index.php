<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-department-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'employee_id',
                'filter' => $employees = $this->context->employees,
                'value' => function ($model) use ($employees) {
                    return array_key_exists($model->employee_id, $employees) ? $employees[$model->employee_id] : 'Сотрудник не существует';
                },
            ],
            [
                'attribute' => 'department_id',
                'filter' => $departments = $this->context->departments,
                'value' => function ($model) use ($departments) {
                    return array_key_exists($model->department_id, $departments) ? $departments[$model->department_id] : 'Отдел не существует';
                },
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
