<?php
use Migrations\AbstractMigration;

class CreateMessageAnswers extends AbstractMigration
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
        $this->table('message_answers', ['id' => false, 'primary_key' => ['message_answers_id']])
            ->addColumn('message_answers_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_destinations_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_choices_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'null' => true,
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

        $this->table('message_answers')
            ->addForeignKey(
                'message_destinations_id',
                'message_destinations',
                'message_destinations_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'message_choices_id',
                'message_choices',
                'message_choices_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('message_answers')
            ->dropForeignKey('message_destinations_id')
            ->dropForeignKey('message_choices_id')
            ->save();

        $this->table('message_answers')->drop()->save();
    }
}
