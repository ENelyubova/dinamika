<?php

class m181218_121816_store_category_image_tbl extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->createTable(
            '{{store_category_image}}',
            [
                'id'       => 'pk',
                'category_id'  => 'integer DEFAULT NULL',
                'image'       => 'string COMMENT "Изображение"',
                'title'       => 'string COMMENT "Название изображения"',
                'alt'         => 'string COMMENT "Alt изображения"',
                'position'    => 'integer COMMENT "Сортировка"',
            ],
            $this->getOptions()
        );
    }

    public function safeDown()
    {
        $this->dropTableWithForeignKeys("{{store_category_image}}");
    }
}