<?php
use Migrations\AbstractMigration;

class CreateMessageBords extends AbstractMigration
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
        $this->table('message_bords', ['id' => false, 'primary_key' => ['message_bords_id']])
            ->addColumn('message_bords_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('message_statuses_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('choice', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('period', 'date', [
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
            ->create();

            $this->table('message_bords')
                ->addForeignKey(
                    'message_statuses_id',
                    'message_statuses',
                    'message_statuses_id',
                    [
                        'update' => 'RESTRICT',
                        'delete' => 'RESTRICT'
                    ]
                )
                ->update();

    }

    public function down()
    {
        $this->table('message_bords')
            ->dropForeignKey('message_statuses_id')
            ->save();

        $this->table('message_bords')->drop()->save();
    }
}
