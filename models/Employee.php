<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name Имя сотрудника
 *
 * @property Department[] $departments
 * @property EmployeeDepartment[] $employeeDepartments
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя сотрудника',
        ];
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['id' => 'department_id'])->viaTable('employee_department', ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[EmployeeDepartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeDepartments()
    {
        return $this->hasMany(EmployeeDepartment::className(), ['employee_id' => 'id']);
    }
}
