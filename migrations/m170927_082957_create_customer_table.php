<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customers`.
 */
class m170927_082957_create_customer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer', [
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
        $this->dropTable('customer');
    }
}
