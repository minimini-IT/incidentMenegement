<?php
use Migrations\AbstractMigration;

class CreateMessageChoices extends AbstractMigration
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
        $this->table('message_choices', ['id' => false, 'primary_key' => ['message_choices_id']])
            ->addColumn('message_choices_id', 'integer', [
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
            ->addColumn('content', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

            $this->table('message_choices')
                ->addForeignKey(
                    'message_bords_id',
                    'message_bords',
                    'message_bords_id',
                    [
                        'update' => 'CASCADE',
                        'delete' => 'CASCADE'
                    ]
                )
                ->update();
    }

    public function down()
    {
        $this->table('message_choices')
            ->dropForeignKey('message_bords_id')
            ->save();

        $this->table('message_choices')->drop()->save();
    }
}
