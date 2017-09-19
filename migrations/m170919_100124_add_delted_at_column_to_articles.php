<?php

use yii\db\Migration;

class m170919_100124_add_delted_at_column_to_articles extends Migration
{
    public function safeUp()
    {
        $this->addColumn('articles', 'deleted_at', $this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('articles', 'deleted_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_100124_add_delted_at_column_to_articles cannot be reverted.\n";

        return false;
    }
    */
}
