<?php
use Migrations\AbstractMigration;

class CreateStatuses extends AbstractMigration
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
        $table = $this->table('statuses', ["id" => false, "primary_key" => ["statuses_id"]]);
        $table->addColumn('statuses_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('status', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('status_sort_number', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);
        $table->create();
    }
    public function down(){
      $this->table('statuses')->drop()->save();
    }
}
