<?php
use Migrations\AbstractMigration;

class CreateMessageBordChronologies extends AbstractMigration
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
        $this->table('message_bord_chronologies', ['id' => false, 'primary_key' => ['message_bord_chronologies_id']])
            ->addColumn('message_bord_chronologies_id', 'integer', [
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
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->create();

        $this->table('message_bord_chronologies')
            ->addForeignKey(
                'message_bords_id',
                'message_bords',
                'message_bords_id',
                [
                    'update' => 'RESTRICT',
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
        //message_bord_chronologies削除
        /*
        $this->table('message_bord_chronologies')
            ->dropForeignKey('message_bords_id')
            ->dropForeignKey('users_id')
            ->save();
         */
        $this->table('message_bord_chronologies')->drop()->save();
    }
}
