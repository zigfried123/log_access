<?php

class m200706_085245_add_table_users extends CDbMigration
{
	public function up()
	{
	    $this->execute('CREATE TABLE user (id INTEGER NOT NULL AUTO_INCREMENT, username VARCHAR(20) NOT NULL, password CHAR(6) NOT NULL, created_at INT NOT NULL, PRIMARY KEY(id))');
	}

	public function down()
	{
        $this->dropTable('user');
	}

}
