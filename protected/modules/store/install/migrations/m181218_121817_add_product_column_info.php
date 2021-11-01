<?php

class m181218_121817_add_product_column_info extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{store_product}}', 'info', 'text');
    }

    public function safeDown()
    {
        $this->dropColumn('{{store_product}}', 'info');
    }
}