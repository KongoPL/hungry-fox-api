<?php

use yii\db\Migration;

/**
 * Class m190827_081451_data
 */
class m190827_081451_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
Yii::$app->db->createCommand("
INSERT INTO `Category` (`id`, `name`, `status`) VALUES
(1,	'Pizza',	1),
(2,	'Burgers',	1),
(3,	'Shakes',	1),
(4,	'Cold drinks',	1),
(5,	'Fries',	1);

INSERT INTO `Coupon` (`id`, `title`, `description`, `dateTo`, `status`) VALUES
(1,	'Summer madness',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta.',	'1970-01-01 00:00:00',	1),
(2,	'Spring madness',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta.',	'1970-01-01 00:00:00',	1),
(3,	'Atumn madness',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta.',	'1970-01-01 00:00:00',	1),
(4,	'Winter madness',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta.',	'1970-01-01 00:00:00',	1);

INSERT INTO `Item` (`id`, `categoryId`, `name`, `description`, `price`, `status`) VALUES
(1,	1,	'European',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis commodo justo eget congue. Proin porta ac urna ut eleifend. Curabitur viverra faucibus magna ut commodo. Phasellus pretium egestas erat, eu semper risus convallis eu. Maecenas eget erat in odio congue convallis. Sed vestibulum sagittis neque. Aliquam sit amet ornare dolor.',	24.99,	1),
(2,	1,	'Farmer',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis commodo justo eget congue. Proin porta ac urna ut eleifend. Curabitur viverra faucibus magna ut commodo. Phasellus pretium egestas erat, eu semper risus convallis eu. Maecenas eget erat in odio congue convallis. Sed vestibulum sagittis neque. Aliquam sit amet ornare dolor.',	20.99,	1),
(3,	1,	'Carbonara',	'Bacon, Corregio cheese, mozzarella, tomatoes, mushrooms, onion, white sauce',	16.99,	1),
(4,	1,	'Vege Mania',	'Fresh spinach, Grana Padano, cherry tomatoes, colorful pepper, mushrooms, red onion, fresh mozzarella, herb tomato sauce.',	28.99,	1),
(5,	2,	'Vegetarian feast',	'It\'s some of <b>Unsafe</b> description',	15.99,	1),
(6,	2,	'Meat with double meat',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis commodo justo eget congue. Proin porta ac urna ut eleifend. Curabitur viverra faucibus magna ut commodo. Phasellus pretium egestas erat, eu semper risus convallis eu. Maecenas eget erat in odio congue convallis. Sed vestibulum sagittis neque. Aliquam sit amet ornare dolor.',	24.99,	1),
(7,	3,	'Chocolate shake',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis commodo justo eget congue. Proin porta ac urna ut eleifend. Curabitur viverra faucibus magna ut commodo. Phasellus pretium egestas erat, eu semper risus convallis eu. Maecenas eget erat in odio congue convallis. Sed vestibulum sagittis neque. Aliquam sit amet ornare dolor.',	6.99,	1),
(8,	3,	'Strawberry shake',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis commodo justo eget congue. Proin porta ac urna ut eleifend. Curabitur viverra faucibus magna ut commodo. Phasellus pretium egestas erat, eu semper risus convallis eu. Maecenas eget erat in odio congue convallis. Sed vestibulum sagittis neque. Aliquam sit amet ornare dolor.',	6.99,	1),
(9,	3,	'Banana shake',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis commodo justo eget congue. Proin porta ac urna ut eleifend. Curabitur viverra faucibus magna ut commodo. Phasellus pretium egestas erat, eu semper risus convallis eu. Maecenas eget erat in odio congue convallis. Sed vestibulum sagittis neque. Aliquam sit amet ornare dolor.',	6.99,	1),
(10,	4,	'Coca cola',	NULL,	3.99,	1),
(11,	4,	'Sprite',	NULL,	3.99,	1),
(12,	4,	'Lemon juice',	NULL,	2.99,	1),
(13,	5,	'Small fries',	NULL,	2.99,	1),
(14,	5,	'Medium fries',	NULL,	3.99,	1),
(15,	5,	'Big fries',	NULL,	4.99,	1);

INSERT INTO `job` (`id`, `title`, `descrpition`, `status`) VALUES
(1,	'Food delivery man',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta, sagittis urna. Praesent diam nunc, rutrum ut lorem eu, viverra fringilla felis. Mauris at sem sem. Donec porta gravida sapien, id condimentum diam sollicitudin sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta, sagittis urna. Praesent diam nunc, rutrum ut lorem eu, viverra fringilla felis. Mauris at sem sem. Donec porta gravida sapien, id condimentum diam sollicitudin sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui nisi, vestibulum nec sapien eget, molestie molestie mauris. Nullam est libero, dictum nec orci vel, lacinia porttitor ex. Morbi vitae cursus nisl. Mauris eget pulvinar lacus, nec iaculis nisi. Integer eu turpis nulla. Phasellus eget lectus rutrum, auctor nibh porta, sagittis urna. Praesent diam nunc, rutrum ut lorem eu, viverra fringilla felis. Mauris at sem sem. Donec porta gravida sapien, id condimentum diam sollicitudin sed.',	1);

INSERT INTO `staff` (`id`, `name`, `position`, `email`, `phone`, `status`) VALUES
(1,	'John Doe',	'Sales manager',	'johndoe@gmail.com',	'+48 123 123 123',	1),
(2,	'Jane Doe',	'Cook chief',	'jane.doe@hungry-fox.com',	'',	1),
(3,	'Olivier Smith',	'Cook',	'',	'',	1),
(4,	'Jakub Poliszuk',	'Webmaster',	'ja.poliszuk@gmail.com',	'',	1);
")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190827_081451_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190827_081451_data cannot be reverted.\n";

        return false;
    }
    */
}
