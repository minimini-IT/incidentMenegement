<?php
use Migrations\AbstractMigration;

class CreateCommentFiles extends AbstractMigration
{
    public function up()
    {
        $this->table('comment_files', ['id' => false, 'primary_key' => ['comment_files_id']])
            ->addColumn('comment_files_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('crew_send_comments_id', 'integer', [
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
            ])
            ->create();

        $this->table('comment_files')
            ->addForeignKey(
                'crew_send_comments_id',
                'crew_send_comments',
                'crew_send_comments_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('comment_files')
            ->dropForeignKey(
                'crew_send_comments_id'
            )->save();

        $this->table('comment_files')->drop()->save();
    }

}
