<?php
use Migrations\AbstractMigration;

class CreateCategories extends AbstractMigration
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
        $table = $this->table('categories', ["id" => false, "primary_key" => ["categories_id"]]);
        $table->addColumn('categories_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
          ]);
        $table->addColumn('category', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('category_sort_number', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);
        $table->create();
    }
    public function down(){
      $this->table('categories')->drop()->save();
    }
}
