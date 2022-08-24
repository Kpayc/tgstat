<?php

use common\models\ActiveRecords\User;
use yii\db\Migration;

/**
 * Class m220823_153754_init_migration
 */
class m220823_153754_init_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->id = 1;
        $user->username = 'admin';
        $user->email = 'admin@admin';
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword('admin');
        $user->generateAuthKey();
        $user->save();

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('app__links', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'url' => $this->string(1000),
            'short_code' => $this->string(5),
            'created_at' => $this->timestamp()->null(),
        ], $tableOptions);

        $this->createIndex('app__links-user_id', 'app__links', 'user_id');
        $this->createIndex('app__links-short_code', 'app__links', 'short_code', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        User::deleteAll();
        $this->dropTable('app__links');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220823_153754_init_migration cannot be reverted.\n";

        return false;
    }
    */
}
