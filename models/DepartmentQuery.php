<?php

namespace app\models;

/**
 * Репозиторий логики для работы с отделами.
 *
 * @see Department
 */
class DepartmentQuery extends \yii\db\ActiveQuery
{
    /**
     * Добавление сотрудника в отдел
     * @param int $employee_id
     * @param int $department_id
     * @return bool
     */
    public function addEmployee(int $employee_id, int $department_id): bool
    {
        $ed = new EmployeeDepartment();
        $ed->employee_id = $employee_id;
        $ed->department_id = $department_id;
        return $ed->save();
    }

    /**
     * Удаление сотрудника из отдела
     * @param int $employee_id
     * @param int $department_id
     * @return bool
     */
    public function deleteEmployee(int $employee_id, int $department_id): bool
    {
        if (EmployeeDepartment::find()->where(['employee_id' => $employee_id, 'department_id' => $department_id])->count() < 2) {
            return false;
        }

        EmployeeDepartment::deleteAll(['employee_id' => $employee_id, 'department_id' => $department_id]);

        return true;
    }

    /**
     * Удаление отдела, с проверкой вхождения сотрудников
     * @param int $id ID отдела
     * @return bool
     * @throws \yii\db\Exception
     */
    public function safeDelete(int $id): bool
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
