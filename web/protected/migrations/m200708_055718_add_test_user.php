<?php

class m200708_055718_add_test_user extends CDbMigration
{
    const TABLE = 'user';

	public function up()
	{
	    $this->insert(self::TABLE, ['username'=>'admin','password'=>123456, 'created_at'=>time()]);
	}

	public function down()
	{
        $this->delete(self::TABLE, ['username'=>'admin']);
	}

}
