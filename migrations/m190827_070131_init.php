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
  `type` VARCHAR(64) NOT NULL,
  `language` VARCHAR(4) NOT NULL,
  `value` TEXT NOT NULL,
  `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


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


-- -----------------------------------------------------
-- Table `Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NULL,
  `phone` VARCHAR(14) NULL,
  `street` VARCHAR(32) NULL,
  `buildingNumber` VARCHAR(5) NULL,
  `apartmentNumber` VARCHAR(5) NULL,
  `paymentMethod` TINYINT(1) UNSIGNED NULL,
  `comments` TEXT NULL,
  `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `createTime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completeTime` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
  `estimatedDeliveryTime` DATETIME NULL,
  `deliveryTime` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrderItem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrderItem` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` INT UNSIGNED NOT NULL,
  `itemId` INT NOT NULL,
  `buyPrice` DECIMAL(5,2) UNSIGNED NULL,
  `quantity` TINYINT(3) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_OrderItem_Order1_idx` (`orderId` ASC),
  INDEX `fk_OrderItem_Item1_idx` (`itemId` ASC),
  CONSTRAINT `fk_OrderItem_Order1`
    FOREIGN KEY (`orderId`)
    REFERENCES `Order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrderItem_Item1`
    FOREIGN KEY (`itemId`)
    REFERENCES `Item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
