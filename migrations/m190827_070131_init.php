<?php

use yii\db\Migration;

/**
 * Class m190827_070131_init
 */
class m190827_070131_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		Yii::$app->db->createCommand("
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NULL,
  `status` TINYINT(1) UNSIGNED NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoryId` INT UNSIGNED NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `price` DECIMAL(5,2) UNSIGNED NULL DEFAULT 0.00,
  `status` TINYINT(1) UNSIGNED NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_Item_Category_idx` (`categoryId` ASC),
  CONSTRAINT `fk_Item_Category`
    FOREIGN KEY (`categoryId`)
    REFERENCES `Category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Translation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Translation` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `table` VARCHAR(32) NOT NULL,
  `column` VARCHAR(32) NOT NULL,
  `recordId` INT(10) UNSIGNED NULL,
  `language` VARCHAR(4) NOT NULL,
  `value` TEXT NOT NULL,
  `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

ALTER TABLE `Translation`
ADD UNIQUE `table_column_recordId_language` (`table`, `column`, `recordId`, `language`);

-- -----------------------------------------------------
-- Table `Coupons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Coupon` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `dateTo` DATETIME NULL DEFAULT '1970-01-01 00:00:00',
  `status` TINYINT(1) UNSIGNED NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Staff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Staff` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NULL,
  `position` VARCHAR(32) NULL,
  `email` VARCHAR(64) NOT NULL DEFAULT '',
  `phone` VARCHAR(15) NOT NULL DEFAULT '',
  `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Job`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Job` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(32) NULL,
  `descrpition` TEXT NULL,
  `status` TINYINT(1) UNSIGNED NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190827_070131_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190827_070131_init cannot be reverted.\n";

        return false;
    }
    */
}
