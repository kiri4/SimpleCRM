<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\Request;

/**
 * .
 */
class EmployeeCreateForm extends Model
{
    public $name;
    public $department_id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'department_id'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['department_id'], 'integer'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name'=>'Имя сотрудника',
            'department_id' => 'Отдел'
        ];
    }


    /**
     * Создаст сотрудника и добавит в отдел
     * @param Request $request
     * @return Employee|false
     */
    public function createEmployee(Request $request)
    {
        if ($this->load($request->post()) && $this->validate()) {

            $model = new Employee;
            $model->name = $this->name;

            if ($model->save()) {
                Department::find()->addEmployee($model->id, $this->department_id);
            }

            return $model;
        }
        return false;
    }
}
