<?php
use Migrations\AbstractMigration;

class CreateFiles extends AbstractMigration
{
    public function up()
    {
        $this->table('files', ['id' => false, 'primary_key' => ['files_id']])
            ->addColumn('files_id', 'integer', [
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
            ->addColumn('file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('file_size', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('unique_file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            //->addIndex(['crew_sends_id'])
            ->create();

        $this->table('files')
            ->addForeignKey(
                'crew_sends_id',
                'crew_sends',
                'crew_sends_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('files')
            ->dropForeignKey(
                'crew_sends_id'
            )->save();

        /*
        $this->table('files')
            ->removeIndex(['crew_sends_id'])
            ->save();
         */
        $this->table('files')->drop()->save();
    }

}
