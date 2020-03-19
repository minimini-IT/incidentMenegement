<?php
use Migrations\AbstractMigration;

class CreateMessageDestinations extends AbstractMigration
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
        $this->table('message_destinations', ['id' => false, 'primary_key' => ['message_destinations_id']])
            ->addColumn('message_destinations_id', 'integer', [
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

            $this->table('message_destinations')
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
                        'delete' => 'CASCADE'
                    ]
                )
                ->update();
    }

    public function down()
    {
        $this->table('message_destinations')
            ->dropForeignKey('message_bords_id')
            ->dropForeignKey('users_id')
            ->save();

        $this->table('message_destinations')->drop()->save();
    }
}
