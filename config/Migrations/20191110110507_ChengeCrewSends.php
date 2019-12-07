<?php
use Migrations\AbstractMigration;

class ChengeCrewSends extends AbstractMigration
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
        $table = $this->table('crew_sends');
        $table->removeColumn("file_group");
        $table->removeColumn("created");
        $table->removeColumn("modifed");
        $table->update();
        $table->addColumn('file_group', 'integer', [
            'default' => null,
            'limit' => 4,
            'null' => true,
        ]);
        $table->update();
    }
    public function down()
    {
        $table = $this->table('crew_sends');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modifed', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();

    }
}
