<?php
use Migrations\AbstractMigration;

class AddRankToUsers extends AbstractMigration
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
      /*
        $this->table('users')
            ->dropForeignKey(
                'class_id'
            )->save();

        $this->table('users')
            ->removeColumn("class_id")
            ->update();

        $table = $this->table('users');
        $table->addColumn('ranks_id', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);
        $table->update();
       */

        $this->table('users')
            ->addForeignKey(
                'ranks_id',
                'ranks',
                'ranks_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }
    public function down(){
      /*
        $this->table('users')
            ->dropForeignKey(
                'ranks_id'
            )->save();
       */
        //$this->table('ranks')->drop()->save();
       
    }
}
