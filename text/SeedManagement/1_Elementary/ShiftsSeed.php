<?php
use Migrations\AbstractSeed;

/**
 * Shifts seed.
 */
class ShiftsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
      $data = [
        [
          "shift" => "日勤",
          "shift_sort_number" => "1"
        ],
        [
          "shift" => "夜勤",
          "shift_sort_number" => "2"
        ],
        [
          "shift" => "日夜勤",
          "shift_sort_number" => "3"
        ]
      ];
        $table = $this->table('shifts');
        $table->insert($data)->save();
    }
}
