<?php

use yii\db\Schema;
use yii\db\Migration;

class m171222_093021_login_attempt extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB';
        }
        $this->createTable(
            '{{%login_attempt}}',
            [
                'id'=> $this->primaryKey(11),
                'key'=> $this->string(255)->notNull(),
                'amount'=> $this->integer(2)->null()->defaultValue(1),
                'reset_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('login_attempt_key_index','{{%login_attempt}}',['key'],false);
        $this->createIndex('login_attempt_amount_index','{{%login_attempt}}',['amount'],false);
        $this->createIndex('login_attempt_reset_at_index','{{%login_attempt}}',['reset_at'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('login_attempt_key_index', '{{%login_attempt}}');
        $this->dropIndex('login_attempt_amount_index', '{{%login_attempt}}');
        $this->dropIndex('login_attempt_reset_at_index', '{{%login_attempt}}');
        $this->dropTable('{{%login_attempt}}');
    }
}
