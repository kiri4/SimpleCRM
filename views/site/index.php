<?php

/* @var $this yii\web\View */

$this->title = 'Тестовая CRM';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Миграции</h2>

                <p><b>php yii migrate</b></p>
                <p>создаст таблицы и уникальный индекс</p>

            </div>
            <div class="col-lg-4">
                <h2>Таблицы</h2>

                <p><b>employee</b> - сотрудники</p>
                <p><b>department</b> - отделы</p>
                <p><b>employee_department</b> - сотрудники в оделах</p>
            </div>
            <div class="col-lg-4">
                <h2>Описание</h2>

                <p>Большая часть кода сгенерирована gii/GRUD генератором с кастомным шаблоном <b>crud/admin</b></p>
                <p>Для закрытия от публичного доступа и заполнения списков, контроллеры наследуются от <b>controllers/BaseController.php</b></b></p>
                <p>Часть логики вынесена в <b>models/DepartmentQuery.php</b></b></p>
            </div>
        </div>

    </div>
</div>
