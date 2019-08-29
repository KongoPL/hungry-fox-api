<?php

use yii\db\Migration;

/**
 * Class m190829_113437_translations
 */
class m190829_113437_translations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		Yii::$app->db->createCommand("
INSERT INTO `Translation` (`id`, `table`, `column`, `recordId`, `language`, `value`, `status`) VALUES
(1,	'Category',	'name',	1,	'pl',	'Pizza',	1),
(2,	'Category',	'name',	2,	'pl',	'Burgery',	1),
(3,	'Category',	'name',	3,	'pl',	'Shakes',	1),
(4,	'Category',	'name',	4,	'pl',	'Zimne napoje',	1),
(5,	'Category',	'name',	5,	'pl',	'Frytki',	1),
(6,	'Coupon',	'title',	1,	'pl',	'Letnie szaleństwo',	1),
(7,	'Coupon',	'title',	2,	'pl',	'Wiosenne szaleństwo',	1),
(8,	'Coupon',	'title',	3,	'pl',	'Jesienne szaleństwo',	1),
(9,	'Coupon',	'title',	4,	'pl',	'Zimowe szaleństwo',	1),
(10,	'Item',	'name',	1,	'pl',	'Europejska',	1),
(11,	'Item',	'name',	2,	'pl',	'Wiejska',	1),
(12,	'Item',	'name',	3,	'pl',	'Carbonara',	1),
(13,	'Item',	'name',	4,	'pl',	'Vege Mania',	1),
(14,	'Item',	'name',	5,	'pl',	'Wegetariańska uczta',	1),
(15,	'Item',	'name',	6,	'pl',	'Mięso z podwójnym mięsem',	1),
(16,	'Item',	'name',	7,	'pl',	'Czekoladowy shake',	1),
(17,	'Item',	'name',	8,	'pl',	'Truskawkowy shake',	1),
(18,	'Item',	'name',	9,	'pl',	'Bananowy shake',	1),
(19,	'Item',	'name',	10,	'pl',	'Coca cola',	1),
(20,	'Item',	'name',	11,	'pl',	'Sprite',	1),
(21,	'Item',	'name',	12,	'pl',	'Sok cytrynowy',	1),
(22,	'Item',	'name',	13,	'pl',	'Małe frytki',	1),
(23,	'Item',	'name',	14,	'pl',	'Średnie frytki',	1),
(24,	'Item',	'name',	15,	'pl',	'Duże frytki',	1),
(25,	'Item',	'description',	3,	'pl',	'Bekon, ser Correggio, mozzarella, pomidory, grzyby, cebula, biała kiełbasa',	1),
(26,	'Item',	'description',	5,	'pl',	'To jest rodzaj <b>niebezpiecznego</b> opisu',	1),
(27,	'Job',	'title',	1,	'pl',	'Dostawca jedzenia',	1),
(28,	'Staff',	'position',	1,	'pl',	'Menager sprzedaży',	1),
(29,	'Staff',	'position',	2,	'pl',	'Szef kuchni',	1),
(30,	'Staff',	'position',	3,	'pl',	'Kucharz',	1),
(31,	'Staff',	'position',	4,	'pl',	'Webmaster',	1);
		")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190829_113437_translations cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190829_113437_translations cannot be reverted.\n";

        return false;
    }
    */
}
