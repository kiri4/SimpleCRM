<?php

use yii\db\Migration;

/**
 * Class m210921_142436_add_foreigh_keys_to_emploee_department_table
 */
class m210921_142436_add_foreigh_keys_to_emploee_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-id-employee_id',
            'employee_department',
            'employee_id',
            'employee',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-id-department_id',
            'employee_department',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210921_142436_add_foreigh_keys_to_emploee_department_table cannot be reverted.\n";

        $this->dropForeignKey(
            'fk-id-employee_id',
            'employee_department'
        );

        $this->dropForeignKey(
            'fk-id-department_id',
            'employee_department'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210921_142436_add_foreigh_keys_to_emploee_department_table cannot be reverted.\n";

        return false;
    }
    */
}
