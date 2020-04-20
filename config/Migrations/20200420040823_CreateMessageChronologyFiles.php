<?php
use Migrations\AbstractMigration;

class CreateMessageChronologyFiles extends AbstractMigration
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
        //message_chronology_files作成
        $this->table('message_chronology_files', ['id' => false, 'primary_key' => ['message_chronology_files_id']])
            ->addColumn('message_chronology_files_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_bord_chronologies_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('file_size', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('unique_file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('message_chronology_files')
            ->addForeignKey(
                'message_bord_chronologies_id',
                'message_bord_chronologies',
                'message_bord_chronologies_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();
    }

    public function down()
    {
        //message_chronology_files削除
        $this->table('message_chronology_files')
            ->dropForeignKey('message_bord_chronologies_id')
            ->save();
        $this->table('message_chronology_files')->drop()->save();
    }
}
