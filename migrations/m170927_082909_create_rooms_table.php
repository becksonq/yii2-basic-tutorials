<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rooms`.
 */
class m170927_082909_create_rooms_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rooms', [
            'id'              => $this->primaryKey(),
            'floor'           => $this->integer(11)->notNull(),
            'room_number'     => $this->integer(11)->notNull(),
            'has_conditioner' => $this->integer(1)->notNull(),
            'has_tv'          => $this->integer(1)->notNull(),
            'has_phone'       => $this->integer(1)->notNull(),
            'available_from'  => $this->date()->notNull(),
            'price_per_day'   => $this->decimal(20, 2)->defaultValue(null),
            'description'     => $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rooms');
    }
}
