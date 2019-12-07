<?php
use Migrations\AbstractMigration;

class ChangeFiles extends AbstractMigration
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
        //file_sizeカラム削除
        $table = $this->table("files");
        $table->removeColumn("file_size");
        $table->update();

        //file_sizeカラム作成（データ型変更）
        $table = $this->table("files");
        $table->addColumn("file_size", "string", [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn("unique_file_name", "string", [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table("files");
        $table->removeColumn("file_size");
        $table->removeColumn("unique_file_name");
        $table->update();

        $table = $this->table("files");
        $table->addColumn("file_size", "integer", [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->update();
    }
}
