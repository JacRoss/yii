<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m171013_094437_create_roles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('roles');
    }
}
