<?php
use Migrations\AbstractMigration;

class ChangeRepeFlagToSchedules extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up(){
      $table = $this->table("schedules");
      $table->changeColumn("repe_flag", "integer", ["limit" => 3]);
      $table->update();
    }

    public function down(){
      $table = $this->table("schedules");
      $table->changeColumn("repe_flag", "integer", ["limit" => 1]);
      $table->update();
    }

  /*
    public function change()
    {
      $table = $this->table("Schedules");
      $table->changeColumn("repe_flag", integer, [limit => 3]);
      $table->update();
    }
   */
}
