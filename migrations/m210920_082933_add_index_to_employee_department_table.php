<?php

use yii\db\Migration;

/**
 * Class m210920_082933_add_index_to_employee_department_table
 * Добавит уникальный индекс, чтобы не повторялась связка сотрудник+отдел
 */
class m210920_082933_add_index_to_employee_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('uni_index', 'employee_department', 'employee_id, department_id', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210920_082933_add_index_to_employee_department_table cannot be reverted.\n";

        $this->dropIndex('uni_index', 'employee_department');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210920_082933_add_index_to_employee_department_table cannot be reverted.\n";

        return false;
    }
    */
}
