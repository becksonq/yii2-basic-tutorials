<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171002_172037_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable( 'user', [
            'id' => $this->primaryKey(),
            'username'      => $this->string( 255 )->notNull(),
            'auth_key'      => $this->string( 32 )->notNull(),
            'password_hash' => $this->string( 255 )->notNull(),
            'access_token'  => $this->string( 100 )->defaultValue( null ),
        ] );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable( 'user' );
    }
}
