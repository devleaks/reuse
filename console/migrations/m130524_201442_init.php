<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
			$tables = Yii::$app->db->schema->getTableNames();
			$dbType = $this->db->driverName;
			$tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
			$tableOptions_mssql = "";
			$tableOptions_pgsql = "";
			$tableOptions_sqlite = "";
			/* MYSQL */
			if (!in_array('ad', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%ad}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'category_id' => 'INT(11) NOT NULL',
					'ad_type' => 'VARCHAR(20) NOT NULL',
					'subject' => 'VARCHAR(80) NOT NULL',
					'description' => 'VARCHAR(255) NOT NULL',
					'price' => 'FLOAT NULL',
					'period' => 'VARCHAR(20) NULL',
					'status' => 'VARCHAR(20) NOT NULL',
					'user_id' => 'INT(11) NOT NULL',
					'expire_at' => 'DATETIME NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
					'donnerie_id' => 'INT(11) NOT NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('category', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%category}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'name' => 'VARCHAR(40) NOT NULL',
					'position' => 'INT(11) NULL',
					'status' => 'VARCHAR(20) NOT NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('donnerie', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%donnerie}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'status' => 'VARCHAR(20) NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
					'name' => 'VARCHAR(40) NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('donnerie_category', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%donnerie_category}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'donnerie_id' => 'INT(11) NOT NULL',
					'category_id' => 'INT(11) NOT NULL',
					'status' => 'VARCHAR(20) NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('history', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%history}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'object_type' => 'TEXT NOT NULL',
					'object_id' => 'INT(11) NOT NULL',
					'action' => 'VARCHAR(20) NOT NULL',
					'note' => 'VARCHAR(80) NULL',
					'performer_id' => 'INT(11) NOT NULL',
					'created_at' => 'DATETIME NOT NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('menu', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%menu}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'parent_id' => 'INT(11) NULL',
					'name' => 'VARCHAR(40) NOT NULL',
					'url' => 'VARCHAR(2048) NULL',
					'position' => 'INT(11) NULL',
					'created_at' => 'INT(11) NULL',
					'updated_at' => 'INT(11) NULL',
					'donnerie_id' => 'INT(11) NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('message', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%message}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'type' => 'VARCHAR(20) NOT NULL',
					'subject' => 'VARCHAR(80) NOT NULL',
					'text' => 'TEXT NOT NULL',
					'language' => 'VARCHAR(20) NOT NULL',
					'position' => 'INT(11) NULL',
					'sticky' => 'TINYINT(1) NOT NULL',
					'status' => 'VARCHAR(20) NOT NULL',
					'expire_at' => 'DATETIME NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
					'name' => 'VARCHAR(40) NOT NULL',
					'donnerie_id' => 'INT(11) NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('migration', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%migration}}', [
					'version' => 'VARCHAR(180) NOT NULL',
					0 => 'PRIMARY KEY (`version`)',
					'apply_time' => 'INT(11) NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('newsletter', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%newsletter}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'donnerie_id' => 'INT(11) NULL',
					'type' => 'VARCHAR(20) NOT NULL',
					'subject' => 'VARCHAR(80) NOT NULL',
					'text' => 'TEXT NOT NULL',
					'name' => 'VARCHAR(40) NOT NULL',
					'language' => 'VARCHAR(20) NOT NULL',
					'position' => 'INT(11) NULL',
					'sticky' => 'TINYINT(1) NOT NULL',
					'status' => 'VARCHAR(20) NOT NULL',
					'expire_at' => 'DATETIME NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('picture', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%picture}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'name' => 'VARCHAR(80) NULL',
					'size' => 'INT(11) NULL',
					'type' => 'VARCHAR(80) NULL',
					'related_id' => 'INT(11) NULL',
					'related_class' => 'VARCHAR(160) NULL',
					'related_attribute' => 'VARCHAR(160) NULL',
					'name_hash' => 'VARCHAR(255) NULL',
					'status' => 'VARCHAR(20) NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('profile', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%profile}}', [
					'user_id' => 'INT(11) NOT NULL',
					0 => 'PRIMARY KEY (`user_id`)',
					'name' => 'VARCHAR(255) NULL',
					'public_email' => 'VARCHAR(255) NULL',
					'gravatar_email' => 'VARCHAR(255) NULL',
					'gravatar_id' => 'VARCHAR(32) NULL',
					'location' => 'VARCHAR(255) NULL',
					'website' => 'VARCHAR(255) NULL',
					'bio' => 'TEXT NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('social_account', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%social_account}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'user_id' => 'INT(11) NULL',
					'provider' => 'VARCHAR(255) NOT NULL',
					'client_id' => 'VARCHAR(255) NOT NULL',
					'data' => 'TEXT NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('token', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%token}}', [
					'user_id' => 'INT(11) NOT NULL',
					0 => 'PRIMARY KEY (`user_id`)',
					'code' => 'VARCHAR(32) NOT NULL',
					1 => 'PRIMARY KEY (`code`)',
					'created_at' => 'INT(11) NOT NULL',
					'type' => 'SMALLINT(6) NOT NULL',
					3 => 'PRIMARY KEY (`type`)',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('user', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%user}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'username' => 'VARCHAR(25) NOT NULL',
					'email' => 'VARCHAR(255) NOT NULL',
					'password_hash' => 'VARCHAR(60) NOT NULL',
					'auth_key' => 'VARCHAR(32) NOT NULL',
					'confirmed_at' => 'INT(11) NULL',
					'unconfirmed_email' => 'VARCHAR(255) NULL',
					'blocked_at' => 'INT(11) NULL',
					'registration_ip' => 'INT(11) UNSIGNED NULL',
					'created_at' => 'INT(11) NOT NULL',
					'updated_at' => 'INT(11) NOT NULL',
					'flags' => 'INT(11) NOT NULL',
					'role' => 'VARCHAR(20) NULL',
					'donnerie_id' => 'INT(11) NOT NULL',
					'language' => 'VARCHAR(20) NULL',
				], $tableOptions_mysql);
			}
			}

			/* MYSQL */
			if (!in_array('user_ad', $tables))  { 
			if ($dbType == "mysql") {
				$this->createTable('{{%user_ad}}', [
					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
					0 => 'PRIMARY KEY (`id`)',
					'ad_id' => 'INT(11) NOT NULL',
					'user_id' => 'INT(11) NOT NULL',
					'status' => 'VARCHAR(20) NOT NULL',
					'expire_at' => 'DATETIME NULL',
					'created_at' => 'DATETIME NULL',
					'updated_at' => 'DATETIME NULL',
				], $tableOptions_mysql);
			}
			}


			$this->createIndex('idx_category_id_4326_00','ad','category_id',0);
			$this->createIndex('idx_user_id_4326_01','ad','user_id',0);
			$this->createIndex('idx_donnerie_id_4326_02','ad','donnerie_id',0);
			$this->createIndex('idx_donnerie_id_4473_03','donnerie_category','donnerie_id',0);
			$this->createIndex('idx_category_id_4473_04','donnerie_category','category_id',0);
			$this->createIndex('idx_donnerie_id_4611_05','menu','donnerie_id',0);
			$this->createIndex('idx_parent_id_4611_06','menu','parent_id',0);
			$this->createIndex('idx_donnerie_id_4668_07','message','donnerie_id',0);
			$this->createIndex('idx_donnerie_id_4746_08','newsletter','donnerie_id',0);
			$this->createIndex('idx_UNIQUE_provider_4885_09','social_account','provider',1);
			$this->createIndex('idx_user_id_4885_10','social_account','user_id',0);
			$this->createIndex('idx_UNIQUE_user_id_4926_11','token','user_id',1);
			$this->createIndex('idx_UNIQUE_username_4974_12','user','username',1);
			$this->createIndex('idx_UNIQUE_email_4974_13','user','email',1);
			$this->createIndex('idx_donnerie_id_4974_14','user','donnerie_id',0);
			$this->createIndex('idx_ad_id_501_15','user_ad','ad_id',0);
			$this->createIndex('idx_user_id_5011_16','user_ad','user_id',0);

			$this->execute('SET foreign_key_checks = 0');
			$this->addForeignKey('fk_donnerie_4318_00','{{%ad}}', 'donnerie_id', '{{%donnerie}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_category_4318_01','{{%ad}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_user_4318_02','{{%ad}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_donnerie_4466_03','{{%donnerie_category}}', 'donnerie_id', '{{%donnerie}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_category_4466_04','{{%donnerie_category}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_donnerie_4604_05','{{%menu}}', 'donnerie_id', '{{%donnerie}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_menu_4605_06','{{%menu}}', 'parent_id', '{{%menu}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_donnerie_4663_07','{{%message}}', 'donnerie_id', '{{%donnerie}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_donnerie_474_08','{{%newsletter}}', 'donnerie_id', '{{%donnerie}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_user_4843_09','{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_user_4879_010','{{%social_account}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_user_4919_011','{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_donnerie_4968_012','{{%user}}', 'donnerie_id', '{{%donnerie}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_ad_5004_013','{{%user_ad}}', 'ad_id', '{{%ad}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->addForeignKey('fk_user_5005_014','{{%user_ad}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
			$this->execute('SET foreign_key_checks = 1;');
        }
    }

    public function down()
    {
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `ad`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `category`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `donnerie`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `donnerie_category`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `history`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `menu`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `message`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `migration`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `newsletter`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `picture`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `profile`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `social_account`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `token`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `user`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `user_ad`');
		$this->execute('SET foreign_key_checks = 1;');
    }
}
