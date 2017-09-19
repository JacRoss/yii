<?php

use yii\db\Migration;

class m170919_094927_add_category_id_column_to_articles extends Migration
{
    public function safeUp()
    {
        $this->addColumn('articles', 'category_id', $this->integer());
        $this->createIndex('articles_category_id_index', 'articles', 'category_id');
        $this->addForeignKey('articles_category_id_foreign', 'articles', 'category_id', 'categories', 'id');
    }

    public function safeDown()
    {
        $this->dropIndex('articles_category_id_index', 'articles');
        $this->dropForeignKey('articles_category_id_foreign', 'articles');
        $this->dropColumn('articles', 'category_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_094927_add_category_id_column_to_articles cannot be reverted.\n";

        return false;
    }
    */
}
