<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_department".
 *
 * @property int $id
 * @property int $employee_id Сотрудник
 * @property int $department_id Отдел
 */
class EmployeeDepartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'department_id'], 'required'],
            [['employee_id', 'department_id'], 'integer'],
            [['employee_id', 'department_id'], 'unique', 'targetAttribute' => ['employee_id', 'department_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Сотрудник',
            'department_id' => 'Отдел',
        ];
    }
}
