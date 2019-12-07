<?php
use Migrations\AbstractMigration;

class ChangeCrewSends extends AbstractMigration
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
        $table->removeColumn("limit");
        $table->update();
        $table->addColumn('period', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('crew_sends');
        $table->removeColumn("period");
        $table->update();
        $table->addColumn('limit', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
