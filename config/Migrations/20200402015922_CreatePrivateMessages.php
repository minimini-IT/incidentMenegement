<?php
use Migrations\AbstractMigration;

class CreatePrivateMessages extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $this->table('private_messages', ['id' => false, 'primary_key' => ['private_messages_id']])
            ->addColumn('private_messages_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_bords_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('private_messages')
            ->addForeignKey(
                'message_bords_id',
                'message_bords',
                'message_bords_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'users_id',
                'users',
                'users_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();
    }

    public function down()
    {
        $this->table('private_messages')
            ->dropForeignKey('message_bords_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('private_messages')->drop()->save();
    }
}
