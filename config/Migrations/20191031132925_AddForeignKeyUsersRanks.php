<?php
use Migrations\AbstractMigration;

class AddForeignKeyUsersRanks extends AbstractMigration
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
        $this->table('users')
            ->addIndex(
                [
                    'ranks_id',
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'ranks_id',
                'ranks',
                'ranks_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                    "constraint" => "fk_ranks_id"
                ]
            )
            ->update();
    }
    public function down(){
        $this->table('users')
            ->dropForeignKey(
                'ranks_id'
            )
            ->save();
    }
}
