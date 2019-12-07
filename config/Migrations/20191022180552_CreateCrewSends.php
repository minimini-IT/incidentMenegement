<?php
use Migrations\AbstractMigration;

class CreateCrewSends extends AbstractMigration
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
        $this->table('crew_sends')->drop()->save();

        $table = $this->table('crew_sends', ["id" => false, "primary_key" => ["crew_sends_id"]]);
        $table->addColumn('crew_sends_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('categories_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('statuses_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('users_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('limit', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('file_group', 'integer', [
            'default' => null,
            'limit' => 4,
            'null' => true,
        ]);
        $table->addColumn('comment', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modifed', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex(
                [
                    'categories_id',
                ]
        );
        $table->addIndex(
                [
                    'statuses_id',
                ]
        );
        $table->addIndex(
                [
                    'users_id',
                ]
        );
        /*
        $table->addIndex(
                [
                    'file_group',
                ]
        );
         */
        $table->create();
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
                'user_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            /*
            ->addForeignKey(
                'file_group',
                'files',
                'file_group',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
             */
            ->update();

    }
    public function down(){
        $this->table('crew_sends')
            ->dropForeignKey(
                'categories_id'
            )
            ->dropForeignKey(
                'statuses_id'
            )
            ->dropForeignKey(
                'users_id'
            )
            /*
            ->dropForeignKey(
                'file_group'
            )
             */
            ->save();

        $this->table('crew_sends')->drop()->save();
    }
}
