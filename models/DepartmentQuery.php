<?php

namespace app\models;

/**
 * Репозиторий логики для работы с отделами.
 *
 * @see Department
 */
class DepartmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Department[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Department|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * Добавление сотрудника в отдел
     * @param $employee_id
     * @param $department_id
     * @return bool
     */
    public function addEmployee($employee_id, $department_id)
    {
        $ed = new EmployeeDepartment();
        $ed->employee_id = $employee_id;
        $ed->department_id = $department_id;
        return $ed->save();
    }

    /**
     * Удаление сотрудника из отдела
     * @param $employee_id
     * @param $department_id
     * @return bool
     */
    public function deleteEmployee($employee_id, $department_id)
    {
        if (EmployeeDepartment::find()->where(['employee_id' => $employee_id, 'department_id' => $department_id])->count() < 2) {
            return false;
        }

        EmployeeDepartment::deleteAll(['employee_id' => $employee_id, 'department_id' => $department_id]);

        return true;
    }

    /**
     * Удаление отдела, с проверкой вхождения сотрудников
     * @param $id ID отдела
     * @return bool
     * @throws \yii\db\Exception
     */
    public function safeDelete($id)
    {
        foreach (\Yii::$app->db->createCommand('SELECT count(*) as deps_count
FROM employee_department 
WHERE employee_id in (SELECT employee_id from employee_department where department_id=:dep_id)
GROUP by employee_id', [
            'dep_id' => $id
        ])->queryAll() as $item) {
            if ($item['deps_count'] < 2) // если есть хоть один сотрудник с менее двумя отделами, то выходим из метода
                return false;
        }

        EmployeeDepartment::deleteAll(['department_id' => $id]);
        Department::deleteAll(['id' => $id]);

        return true;
    }
}
