<?php
use Migrations\AbstractMigration;

class RemoveClassesCreateRanks extends AbstractMigration
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
      //ranksすでにある
      /*
      $this->table('ranks', ['id' => false, 'primary_key' => ['ranks_id']])
          ->addColumn('ranks_id', 'integer', [
              'autoIncrement' => true,
              'default' => null,
              'limit' => 3,
              'null' => false,
          ])
          ->addColumn('rank', 'string', [
              'default' => null,
              'limit' => 8,
              'null' => false,
          ])
          ->addColumn('abb_rank', 'string', [
              'default' => null,
              'limit' => 8,
              'null' => false,
          ])
          ->addColumn('rank_sort_number', 'integer', [
              'default' => null,
              'limit' => 3,
              'null' => false,
          ])
          ->create();
       */
      
      //usersテーブルにはすでにranks_idはある
      /*
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
      $this->table('users')
        ->dropForeignKey(
            'ranks_id'
        )->save();

      /*
        $this->table('users')
            ->removeColumn("ranks_id")
            ->update();
      $this->table('ranks')->drop()->save();
       */
    }
}
