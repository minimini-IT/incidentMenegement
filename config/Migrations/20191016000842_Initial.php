<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('belongs', ['id' => false, 'primary_key' => ['belongs_id']])
            ->addColumn('belongs_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('belong', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('belong_sort_number', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => true,
            ])
            ->create();

        /*
        $this->table('classes', ['id' => false, 'primary_key' => ['classes_id']])
            ->addColumn('classes_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('class', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('class_sort_number', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->create();
         */

        $this->table('duties', ['id' => false, 'primary_key' => ['duties_id']])
            ->addColumn('duties_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('duty', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('duty_sort_number', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->create();

        $this->table('positions', ['id' => false, 'primary_key' => ['positions_id']])
            ->addColumn('positions_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('position', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => true,
            ])
            ->addColumn('position_sort_number', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->create();

        $this->table('shifts', ['id' => false, 'primary_key' => ['shifts_id']])
            ->addColumn('shifts_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('shift', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('shift_sort_number', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->create();

        $this->table('users', ['id' => false, 'primary_key' => ['user_id']])
            ->addColumn('user_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            /*
            ->addColumn('class_id', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
             */
            ->addColumn('belong_id', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('user_sort_number', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addIndex(
                [
                    'belong_id',
                ]
            )
            /*
            ->addIndex(
                [
                    'class_id',
                ]
            )
             */
            ->create();

        $this->table('workers', ['id' => false, 'primary_key' => ['date', 'users_id']])
            ->addColumn('date', 'date', [
                'default' => null,
                'limit' => null,
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
            ->addIndex(
                [
                    'duties_id',
                ]
            )
            ->addIndex(
                [
                    'positions_id',
                ]
            )
            ->addIndex(
                [
                    'shifts_id',
                ]
            )
            ->addIndex(
                [
                    'users_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addForeignKey(
                'belong_id',
                'belongs',
                'belongs_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            /*
            ->addForeignKey(
                'class_id',
                'classes',
                'classes_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
             */
            ->update();

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
                'user_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('users')
            ->dropForeignKey(
                'belong_id'
            )
            /*
            ->dropForeignKey(
                'class_id'
            )
             */
              ->save();

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

        $this->table('belongs')->drop()->save();
        //$this->table('classes')->drop()->save();
        $this->table('duties')->drop()->save();
        $this->table('positions')->drop()->save();
        $this->table('shifts')->drop()->save();
        $this->table('users')->drop()->save();
        $this->table('workers')->drop()->save();
    }
}
