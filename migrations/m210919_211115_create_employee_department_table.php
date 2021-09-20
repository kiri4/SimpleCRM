<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee_department}}`.
 */
class m210919_211115_create_employee_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee_department}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer()->notNull()->comment('Сотрудник'),
            'department_id' => $this->integer()->notNull()->comment('Отдел'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee_department}}');
    }
}
