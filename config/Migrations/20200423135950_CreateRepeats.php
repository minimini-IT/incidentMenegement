<?php
use Migrations\AbstractMigration;

class CreateRepeats extends AbstractMigration
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
        //repeats作成
        $this->table('repeats', ['id' => false, 'primary_key' => ['repeats_id']])
            ->addColumn('repeats_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('repeat', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('repeat_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->create();

        //schedule_repeats作成
        $this->table('schedule_repeats', ['id' => false, 'primary_key' => ['schedule_repeats_id']])
            ->addColumn('schedule_repeats_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('repeats_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('schedules_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->create();

        $this->table('schedule_repeats')
            ->addForeignKey(
                'repeats_id',
                'repeats',
                'repeats_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'schedules_id',
                'schedules',
                'schedules_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();
    }

    public function down()
    {
        $this->table('schedule_repeats')
            ->dropForeignKey('repeats_id')
            ->dropForeignKey('schedules_id')
            ->save();
        $this->table('schedule_repeats')->drop()->save();

        $this->table('repeats')->drop()->save();
    }
}
