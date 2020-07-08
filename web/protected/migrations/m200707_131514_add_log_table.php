<?php

class m200707_131514_add_log_table extends CDbMigration
{
	public function up()
	{
        $this->execute('CREATE TABLE log_access (id INT NOT NULL AUTO_INCREMENT, ip VARCHAR(20) NOT NULL, date INT NOT NULL, data VARCHAR(300) NOT NULL, PRIMARY KEY(id))');
	}

	public function down()
	{
		$this->dropTable('log_access');
	}

}
