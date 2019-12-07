<?php
use Migrations\AbstractMigration;

class CreateSchedules extends AbstractMigration
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
        $table = $this->table('schedules', ["id" => false, "primary_key" => ["schedules_id"]]);
        $table->addColumn('schedules_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('schedule_start_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('schedule_end_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('repe_flag', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => false,
        ]);
        $table->addColumn('schedule', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
    public function down(){
      $this->table('schedules')->drop()->save();
    }
}
