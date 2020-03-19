<?php
use Migrations\AbstractMigration;

class CreateCrewSendComments extends AbstractMigration
{
    public function up()
    {
        $this->table('crew_send_comments', ['id' => false, 'primary_key' => ['crew_send_comments_id']])
            ->addColumn('crew_send_comments_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('crew_sends_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            //->addIndex(['crew_sends_id','users_id',], ["unique" =>true])
            ->create();

        $this->table('crew_send_comments')
            ->addForeignKey(
                'crew_sends_id',
                'crew_sends',
                'crew_sends_id',
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
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }
    public function down()
    {
        $this->table('crew_send_comments')
            ->dropForeignKey(
                'crew_sends_id'
            )
            ->dropForeignKey(
                'users_id'
            )
            ->save();

/*
        $this->table("crew_send_comments")
            ->removeIndex(["crew_sends_id", "users_id"])
            ->save();
*/

        $this->table('crew_send_comments')->drop()->save();
    }
    
}
