<?php
use Migrations\AbstractMigration;

class CreateCrewSends extends AbstractMigration
{
    public function up()
    {
        $this->table('crew_sends', ['id' => false, 'primary_key' => ['crew_sends_id']])
            ->addColumn('crew_sends_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('categories_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('statuses_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('period', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->create();

        $this->table('crew_sends')
            ->addForeignKey(
                'categories_id',
                'categories',
                'categories_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'statuses_id',
                'statuses',
                'statuses_id',
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
        $this->table('crew_sends')
            ->dropForeignKey('categories_id')
            ->dropForeignKey('statuses_id')
            ->dropForeignKey('users_id')
            ->save();

        $this->table('crew_sends')->drop()->save();
    }
}
