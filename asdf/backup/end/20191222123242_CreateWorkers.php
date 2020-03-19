<?php
use Migrations\AbstractMigration;

class CreateWorkers extends AbstractMigration
{
    public function up()
    {
        $this->table('workers', ['id' => false, 'primary_key' => ['date', 'users_id']])
            ->addColumn('date', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('positions_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('shifts_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('duties_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            //->addIndex(['duties_id','positions_id','shifts_id','users_id',], ["unique" => true])
            ->create();

        $this->table('workers')
            ->addForeignKey(
                'duties_id',
                'duties',
                'duties_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'positions_id',
                'positions',
                'positions_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'shifts_id',
                'shifts',
                'shifts_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'users_id',
                'users',
                'users_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('workers')
            ->dropForeignKey(
                'duties_id'
            )
            ->dropForeignKey(
                'positions_id'
            )
            ->dropForeignKey(
                'shifts_id'
            )
            ->dropForeignKey(
                'users_id'
            )->save();

        /*
        $this->table("workers")
          ->removeIndex(["duties_id", "positions_id", "shifts_id", "users_id"])
        ->save();
         */

        $this->table('workers')->drop()->save();
    }

}
