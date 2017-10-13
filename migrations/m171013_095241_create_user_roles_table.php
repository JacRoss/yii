<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_roles`.
 */
class m171013_095241_create_user_roles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_roles', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'role_id' => $this->integer(),

            'expire_in' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('users_user_id_index', 'user_roles', 'user_id');
        $this->createIndex('user_roles_role_id_index', 'user_roles', 'role_id');

        $this->addForeignKey('user_roles_user_id_foreign', 'user_roles', 'user_id', 'users', 'id');
        $this->addForeignKey('user_roles_role_id_foreign', 'user_roles', 'role_id', 'roles', 'id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_roles');
    }
}
