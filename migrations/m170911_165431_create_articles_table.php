<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles`.
 */
class m170911_165431_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(),
            'body' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('articles_user_id_index', 'articles', 'user_id');
        $this->addForeignKey('articles_user_id_foreign', 'articles', 'user_id', 'users', 'id', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articles');
    }
}
