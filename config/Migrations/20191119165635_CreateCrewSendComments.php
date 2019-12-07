<?php
use Migrations\AbstractMigration;

class CreateCrewSendComments extends AbstractMigration
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
        $table = $this->table('crew_send_comments', ["id" => false, "primary_key" =>["crew_send_comments_id"]]);
        $table->addColumn('crew_send_comments_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('crew_sends_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('users_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('file_group', 'integer', [
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('comment', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex(['crew_sends_id']);
        $table->addIndex(['users_id']);
        $table->addForeignKey(
            'crew_sends_id',
            'crew_sends',
            'crew_sends_id',
            [
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT'
            ]
        );
        $table->addForeignKey(
            'users_id',
            'users',
            'user_id',
            [
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT'
            ]
        );
        $table->create();
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
        $this->table('crew_send_comments')->drop()->save();
        
    }
}
