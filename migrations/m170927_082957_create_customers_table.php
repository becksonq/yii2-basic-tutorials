<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customers`.
 */
class m170927_082957_create_customers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customers', [
            'id'           => $this->primaryKey(),
            'name'         => $this->string(50)->notNull(),
            'surname'      => $this->string(50)->notNull(),
            'phone_number' => $this->string(50)->defaultValue(null)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('customers');
    }
}
